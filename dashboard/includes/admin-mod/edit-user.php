<?php

require("../assets\setup\db.inc.php");
// Check if the form has been submitted
if (isset($_POST['update-profile'])) {
  // Extract the values from the form
  $id = $_POST['user_id'];
  $username = $_POST['username'];
  $user_level = $_POST['user_level'];
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];

  // Fetch the old username before the update operation
  $oldUsernameQuery = "SELECT username FROM users WHERE id='$id'";
  $oldUsernameResult = mysqli_query($conn, $oldUsernameQuery);
  $oldUsernameData = mysqli_fetch_assoc($oldUsernameResult);
  $old_username = $oldUsernameData['username']; // Extract the old username

  // Add the query to temporarily disable foreign key checks
  mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=0");

  // Add the query to update user_uploads table
  $new_username = $username; // Set the new username here
  $sql_update_uploads = "UPDATE user_uploads SET username = '$new_username' WHERE username = '$old_username'";
  mysqli_query($conn, $sql_update_uploads);

  // Prepare and execute the SQL update statement for the users table
  $sql = "UPDATE users SET username='$username', user_level='$user_level', first_name='$first_name', last_name='$last_name', email='$email' WHERE id='$id'";
  if (mysqli_query($conn, $sql)) {
      // The update was successful
  } else {
      // There was an error with the update
  }

  // Re-enable foreign key checks
  mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=1");
}



// Check if a user ID has been provided
if (isset($_POST['user_id'])) {
  $id = $_POST['user_id'];
  // Prepare and execute the SQL select statement
  $sql = "SELECT * FROM users WHERE id = '$id'";
  $result = mysqli_query($conn, $sql);
  $user = mysqli_fetch_assoc($result);
}

?>
<!-- HTML form -->
<div class="container">
  <div class="row">
    <h6 class="h3 mt-5 mb-3 font-weight-normal text-muted text-center col-12">Edit User Profile</h6>
    <div class="col-lg-8">

      <form class="form-auth mt-0" action="?table=edit" method="post">

        <div class="form-group">
          <label for="user_id">Search User ID</label>
          <div class="input-group">
            <input class="form-control" placeholder="ID" min="1" type="number"
              value="<?php if (isset($_POST['user_id']))
                echo $_POST['user_id']; ?>" name="user_id">
            <div class="input-group-append">
              <button class="btn btn-dark" type="submit" id="search">Search User by ID</button>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" class="form-control" placeholder="Username"
            value="<?php if (isset($user['username']))
              echo $user['username']; ?>" autocomplete="off">
        </div>

        <div class="form-group">
          <label for="user_level">User Level</label>
          <input type="text" id="user_level" name="user_level" class="form-control" placeholder="User Level"
            value="<?php if (isset($user['user_level']))
              echo $user['user_level']; ?>" autocomplete="off">
        </div>

        <div class="form-group">
          <label for="first_name">First Name</label>
          <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First Name"
            value="<?php if (isset($user['first_name']))
              echo $user['first_name']; ?>">
        </div>

        <div class="form-group">
          <label for="last_name">Last Name</label>
          <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last Name"
            value="<?php if (isset($user['last_name']))
              echo $user['last_name']; ?>">
        </div>

        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" id="email" name="email" class="form-control" placeholder="Email address"
            value="<?php if (isset($user['email']))
              echo $user['email']; ?>">
        </div>

        <button class="btn btn-lg btn-dark btn-block mb-5" type="submit" name='update-profile'>Confirm Changes</button>

      </form>

    </div>
    <div class="col-4 mt-5">
      <?php include('../assets/layouts/profile-preview.php'); ?>
    </div>
  </div>
</div>

<script>
  window.onload = function () {
    var element = document.querySelector(".h3");
    if (element) {
      element.scrollIntoView({ behavior: "auto", block: "start" });
    }
  };
</script>