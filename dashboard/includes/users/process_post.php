<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve post content
  $postContent = $_POST["post_content"];

  // Handle media file upload
  if (isset($_FILES["media_upload"]) && $_FILES["media_upload"]["error"] == UPLOAD_ERR_OK) {
    $uploadDir = '../../../assets/uploads/users/post/';
    $uploadFile = $uploadDir . basename($_FILES["media_upload"]["name"]);

    if (move_uploaded_file($_FILES["media_upload"]["tmp_name"], $uploadFile)) {
      // File upload successful
      // You can save the $uploadFile path in your database
      // and associate it with the user's post
    } else {
      // File upload failed
      echo "File upload failed.";
    }
  }

  // Save the post content and media file path in your database
  // You'll need to adjust this part based on your database structure
  // Insert SQL statement here

  // Redirect the user or display a success message
  header("Location: ../../"); // Redirect to a user's dashboard page
}
?>
