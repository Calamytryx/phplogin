<?php
session_start();

require '../../assets/includes/security_functions.php';
require '../../assets/includes/auth_functions.php';
check_verified();

require '../../assets/vendor/PHPMailer/src/Exception.php';
require '../../assets/vendor/PHPMailer/src/PHPMailer.php';
require '../../assets/vendor/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['update-profile'])) {

  foreach ($_POST as $key => $value) {

    $_POST[$key] = _cleaninjections(trim($value));
  }

  if (!verify_csrf_token()) {

    $_SESSION['STATUS']['editstatus'] = 'Request could not be validated';
    header("Location: ../");
    exit();
  }


  require '../../assets/setup/db.inc.php';
  require '../../assets/includes/datacheck.php';

  $username = $_POST['username'];
  $email = $_POST['email'];
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $headline = $_POST['headline'];
  $bio = $_POST['bio'];

  if (isset($_POST['gender']))
    $gender = $_POST['gender'];
  else
    $gender = NULL;


  $oldPassword = $_POST['password'];
  $newpassword = $_POST['newpassword'];
  $passwordrepeat = $_POST['confirmpassword'];


  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    $_SESSION['ERRORS']['emailerror'] = 'invalid email, try again';
    header("Location: ../");
    exit();
  }
  if ($_SESSION['email'] != $email && !availableEmail($conn, $email)) {

    $_SESSION['ERRORS']['emailerror'] = 'email already taken';
    header("Location: ../");
    exit();
  }
  if ($_SESSION['username'] != $username && !availableUsername($conn, $username)) {

    $_SESSION['ERRORS']['usernameerror'] = 'username already taken';
    header("Location: ../");
    exit();
  } else {

    $FileNameNew = $_SESSION['profile_image'];
    $file = $_FILES['avatar'];

    if (!empty($_FILES['avatar']['name'])) {
      $fileName = $_FILES['avatar']['name'];
      $fileTmpName = $_FILES['avatar']['tmp_name'];
      $fileSize = $_FILES['avatar']['size'];
      $fileError = $_FILES['avatar']['error'];
      $fileType = $_FILES['avatar']['type'];

      $fileExt = explode('.', $fileName);
      $fileActualExt = strtolower(end($fileExt));

      $allowed = array('jpg', 'jpeg', 'png', 'gif');
      if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
          if ($fileSize < 10000000) {
            $FileNameNew = uniqid('', true) . "." . $fileActualExt;
            $fileDestination = '../../assets/uploads/users/' . $FileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);

            // Update the session with the new image name
            $_SESSION['profile_image'] = $FileNameNew;

            // Update the database with the new image name
            $userId = $_SESSION['id'];
            $userimage = $_SESSION['profile_image'];
            $sql = "UPDATE users SET profile_image = ? WHERE id = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "si", $FileNameNew, $userId);
            mysqli_stmt_execute($stmt);

          } else {
            $_SESSION['ERRORS']['imageerror'] = 'Image size should be less than 10MB';
          }
        } else {
          $_SESSION['ERRORS']['imageerror'] = 'Image upload failed, try again';
        }
      } else {
        $_SESSION['ERRORS']['imageerror'] = 'Invalid image type, try again';
      }
    }

    header("Location: ../");
    exit();


    if (!empty($oldPassword) || !empty($newpassword) || !empty($passwordRepeat)) {

      include 'password-edit.inc.php';
    }

    if ($passwordUpdated) {

      $to = $_SESSION['email'];
      $subject = 'Password Updated';


      $mail_variables = array();

      $mail_variables['APP_NAME'] = APP_NAME;
      $mail_variables['email'] = $_SESSION['email'];

      $message = file_get_contents("./template_notificationemail.php");

      foreach ($mail_variables as $key => $value) {

        $message = str_replace('{{ ' . $key . ' }}', $value, $message);
      }

      $mail = new PHPMailer(true);

      try {

        $mail->isSMTP();
        $mail->Host = MAIL_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = MAIL_USERNAME;
        $mail->Password = MAIL_PASSWORD;
        $mail->SMTPSecure = MAIL_ENCRYPTION;
        $mail->Port = MAIL_PORT;

        $mail->setFrom(MAIL_USERNAME, APP_NAME);
        $mail->addAddress($to, APP_NAME);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
      } catch (Exception $e) {


      }
    }


    $sql = "UPDATE users 
            SET username=?,
            email=?, 
            first_name=?, 
            last_name=?, 
            gender=?, 
            headline=?, 
            bio=?, 
            profile_image=?";

    if ($passwordUpdated) {

      $sql .= ", password=? 
                    WHERE id=?;";
    } else {

      $sql .= " WHERE id=?;";
    }

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {

      $_SESSION['ERRORS']['scripterror'] = 'SQL ERROR';
      header("Location: ../");
      exit();
    } else {

      if ($passwordUpdated) {

        $hashedPwd = password_hash($newpassword, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param(
          $stmt,
          "ssssssssss",
          $username,
          $email,
          $first_name,
          $last_name,
          $gender,
          $headline,
          $bio,
          $FileNameNew,
          $hashedPwd,
          $_SESSION['id']
        );
      } else {

        mysqli_stmt_bind_param(
          $stmt,
          "sssssssss",
          $username,
          $email,
          $first_name,
          $last_name,
          $gender,
          $headline,
          $bio,
          $FileNameNew,
          $_SESSION['id']
        );
      }

      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);


      $_SESSION['username'] = $username;
      $_SESSION['email'] = $email;
      $_SESSION['first_name'] = $first_name;
      $_SESSION['last_name'] = $last_name;
      $_SESSION['gender'] = $gender;
      $_SESSION['headline'] = $headline;
      $_SESSION['bio'] = $bio;
      $_SESSION['profile_image'] = $FileNameNew;

      $_SESSION['STATUS']['editstatus'] = 'profile successfully updated';
      header("Location: ../");
      exit();
    }
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);
} else {

  header("Location: ../");
  exit();
}