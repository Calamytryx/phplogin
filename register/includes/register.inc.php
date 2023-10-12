<?php

session_start();

require '../../assets/includes/auth_functions.php';
require '../../assets/includes/datacheck.php';
require '../../assets/includes/security_functions.php';

check_logged_out();


if (isset($_POST['signupsubmit'])) {

  foreach ($_POST as $key => $value) {

    $_POST[$key] = _cleaninjections(trim($value));
  }

  if (!verify_csrf_token()) {

    $_SESSION['STATUS']['signupstatus'] = 'Request could not be validated';
    header("Location: ../");
    exit();
  }



  require '../../assets/setup/db.inc.php';

  $username = $_POST['username'];
  $full_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $passwordRepeat = $_POST['confirmpassword'];
  $headline = $_POST['headline'];
  $bio = $_POST['bio'];

  if (isset($_POST['gender']))
    $gender = $_POST['gender'];
  else
    $gender = NULL;

  if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {

    $_SESSION['ERRORS']['formerror'] = 'required fields cannot be empty, try again';
    header("Location: ../");
    exit();
  } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {

    $_SESSION['ERRORS']['usernameerror'] = 'invalid username';
    header("Location: ../");
    exit();
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    $_SESSION['ERRORS']['emailerror'] = 'invalid email';
    header("Location: ../");
    exit();
  } else if ($password !== $passwordRepeat) {

    $_SESSION['ERRORS']['passworderror'] = 'passwords do not match';
    header("Location: ../");
    exit();
  } else {

    if (!availableUsername($conn, $username)) {

      $_SESSION['ERRORS']['usernameerror'] = 'username already taken';
      header("Location: ../");
      exit();
    }
    if (!availableEmail($conn, $email)) {

      $_SESSION['ERRORS']['emailerror'] = 'email already taken';
      header("Location: ../");
      exit();
    }

    $FileNameNew = '_defaultUser.png';
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

          } else {

            $_SESSION['ERRORS']['imageerror'] = 'image size should be less than 10MB';
            header("Location: ../");
            exit();
          }
        } else {

          $_SESSION['ERRORS']['imageerror'] = 'image upload failed, try again';
          header("Location: ../");
          exit();
        }
      } else {

        $_SESSION['ERRORS']['imageerror'] = 'invalid image type, try again';
        header("Location: ../");
        exit();
      }
    }

    $sql = "insert into users(username, email, password, salt, first_name, last_name, gender, 
                headline, bio, profile_image, created_at) 
                values ( ?,?,?,?,?,?,?,?,?,?, NOW() )";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {

      $_SESSION['ERRORS']['scripterror'] = 'SQL ERROR';
      header("Location: ../");
      exit();
    } else {

      $salt = bin2hex(random_bytes(16));

      // Hash the password with the salt
      $hashed_password = password_hash(hash("md5", $password . $salt), PASSWORD_DEFAULT);

      mysqli_stmt_bind_param($stmt, "ssssssssss", $username, $email, $hashed_password, $salt, $full_name, $last_name, $gender, $headline, $bio, $FileNameNew);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);

      require 'sendverificationemail.inc.php';

      $_SESSION['STATUS']['loginstatus'] = 'Thank you for creating an account, please Login';
      header("Location: ../../login/");
      exit();
    }
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);
} else {

  header("Location: ../");
  exit();
}