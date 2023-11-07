<div class='card card-profile text-center box-shadow bg-white sticky-top'>

  <?php if (isset($_SESSION['auth'])) { ?>

    <img alt='' class='card-img-top card-user-cover' src='../assets/images/banner.png'>
    <div class='card-block'>
      <a href='../profile'>
        <img src='../assets/uploads/users/<?php if (isset($user['profile_image'])){ echo $user['profile_image'];}else{ echo '_defaultUser.png';} ?>' class='card-img-profile'>
      </a>
      <h4 class='card-title'>
        <?php if (isset($user['username'])) echo $user['username']; elseif(isset($_POST['user_id']) && $_POST['user_id']== null) echo 'Search for a User'  ; else echo 'Account does not exist';?>
        <small class="text-muted">
          <?php if (isset($user['email'])) echo $user['email']; ?>
        </small>
        <small class="text-muted mt-2">
          <?php if (isset($user['first_name'], $user['last_name'])) echo $user['first_name'] . ' ' . $user['last_name']; ?>
        </small>
        <small class="text-muted mt-4">
          <?php if (isset($user['headline'])) echo $user['headline']; ?>
        </small>
      </h4>
    </div>

  <?php } else { ?>

    <img alt='' class='card-img-top card-user-cover' src='../assets/images/banner.png'>
    <div class='card-block'>
      <a href='#'>
        <img src='../assets/images/random.png' class='card-img-profile'>
      </a>
      <h5 class='card-title'>
        Hello
        <small class="text-muted">
          <a href="#">my whatever</a>
        </small>
        <br>
        <small class="text-muted">bullshitbullshitbullshit</small>
      </h5>
    </div>

  <?php } ?>

</div>