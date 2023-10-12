<?php
// Query to fetch the image source and uploader's username
$sql = "SELECT image_source, username, message_content
        FROM user_uploads 
        WHERE username = '" . $_SESSION['username'] . "'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $imageSource = $row["image_source"];
    $uploaderUsername = $row["username"];
    $messageContent = $row["message_content"];
    $messageFiles = $row["media_files"];

    // Output the HTML structure
    echo '<div class="media text-muted pt-3">';
    echo '<img src="' . $imageSource . '" width="5%" height="5%" alt="" class="mr-2 rounded">';
    echo '<p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">';
    echo '<strong class="d-block text-gray-dark">@' . $uploaderUsername . '</strong>';
    echo $messageContent;
    echo $messageFiles;
    // Add media files like audio, images, or videos here
    echo '</p>';
    echo '</div>';
  }
} else {
  echo "No data found.";
}

// Close the database connection
mysqli_close($conn);
?>