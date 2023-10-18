<?php
session_start();
require '../../assets/setup/db.inc.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve post content
  $postContent = isset($_POST["post_content"]) ? $_POST["post_content"] : '';
  $imageSource = $_SESSION['profile_image']; 
  $uploaderUsername = $_SESSION['username'];
  // Handle media file upload if it exists
  if (isset($_FILES["media_upload"]) && $_FILES["media_upload"]["error"] == UPLOAD_ERR_OK) {
    $fileName = $_FILES['media_upload']['name'];
    $fileTmpName = $_FILES['media_upload']['tmp_name'];
    $fileSize = $_FILES['media_upload']['size'];
    $fileError = $_FILES['media_upload']['error'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'gif');
    if (in_array($fileActualExt, $allowed)) {
      if ($fileError === 0) {
        if ($fileSize < 10000000) {
          $fileNameNew = uniqid('', true) . "." . $fileActualExt;

          // Get the absolute path of the current file
          $uploadDir = '../../assets/uploads/users/post/';
          $fileDestination = $uploadDir . $fileNameNew;

          if (move_uploaded_file($fileTmpName, $fileDestination)) {
            // File upload successful
            // Insert into database if there is any post content or just an image
            if (!empty($postContent) || $fileNameNew) {
              $sql = "INSERT INTO user_uploads (image_source, username, message_content, media_files, created_at) VALUES (?, ?, ?, ?, now())";
              $stmt = mysqli_prepare($conn, $sql);

              if ($stmt) {
                mysqli_stmt_bind_param($stmt, 'ssss', $imageSource, $uploaderUsername, $postContent, $fileNameNew);
                if (mysqli_stmt_execute($stmt)) {
                  // Redirect the user or display a success message
                  header("Location: ../"); // Redirect to a user's dashboard page
                  exit();
                } else {
                  $_SESSION['ERRORS']['scripterror'] = 'SQL ERROR';
                }
              }
            }
          } else {
            $_SESSION['ERRORS']['imageerror'] = 'File upload failed.';
          }
        } else {
          $_SESSION['ERRORS']['imageerror'] = 'Image size should be less than 10MB';
        }
      } else {
        $_SESSION['ERRORS']['imageerror'] = 'Image upload failed, try again';
      }
    } else {
      $_SESSION['ERRORS']['imageerror'] = 'Invalid image type, try again';
    }
  } else {
    // If there's no image, insert only the post content into the database
    if (!empty($postContent)) {
      $sql = "INSERT INTO user_uploads (image_source, username, message_content, created_at) VALUES (?, ?, ?, now())";
      $stmt = mysqli_prepare($conn, $sql);

      if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'sss', $imageSource, $uploaderUsername, $postContent);
        if (mysqli_stmt_execute($stmt)) {
          // Redirect the user or display a success message
          header("Location: ../"); // Redirect to a user's dashboard page
          exit();
        } else {
          $_SESSION['ERRORS']['scripterror'] = 'SQL ERROR';
        }
      }
    }
  }
}
header("Location: ../");
exit();
?>