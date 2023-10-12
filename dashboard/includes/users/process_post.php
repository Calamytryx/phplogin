<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve post content
  $postContent = $_POST["message_content"];

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
  // Prepare the SQL statement with placeholders
  $sql = "INSERT INTO user_uploads (username, message_content, image_source, media_files) VALUES (:uploader, :message, :image)";

  // Bind values to the placeholders
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':uploader', $_SESSION['username'], PDO::PARAM_STR);
  $stmt->bindParam(':message', $postContent, PDO::PARAM_STR);
  $stmt->bindParam(':image', $uploadFile, PDO::PARAM_STR);

  // Execute the statement
  $stmt->execute();

  // Redirect the user or display a success message
  header("Location: ../../"); // Redirect to a user's dashboard page

  // Redirect the user or display a success message
  header("Location: ../../"); // Redirect to a user's dashboard page
}
?>