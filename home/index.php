<?php

define('TITLE', "Home");
include '../assets/layouts/header.php';
check_verified();

?>


<main role="main">

  <div class="row">
    <div class="col-sm-3">

      <?php include('../assets/layouts/profile-card.php'); ?>

    </div>
    <div class="col-sm-7">

      <div class="d-flex align-items-center p-3 mt-5 mb-3 text-white-50 bg-dark rounded box-shadow">
        <img class="mr-3" src="../assets/images/logonotextwhite.png" alt="" width="48" height="48">
        <div class="lh-100">
          <h6 class="mb-0 text-white lh-100">Hey there,
            <?php echo $_SESSION['username']; ?>
          </h6>
          <small>Last logged in at
            <?php echo date("m-d-Y", strtotime($_SESSION['last_login_at'])); ?>
          </small>
        </div>
      </div>

      <div class="my-3 p-3 bg-white rounded box-shadow">
        <h4 class="mb-0">Latest posts</h4>
        <?php include "includes/post.php" ?>

        <form action="includes\process_post.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="post_content">Post Content:</label>
            <textarea class="form-control" id="post_content" name="post_content" rows="4"></textarea>
          </div>
          <div class="form-group">
            <label for="media_upload">Upload Media:</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="media_upload" name="media_upload">
              <label class="custom-file-label" for="media_upload">Choose file</label>
            </div>

          </div>
          <button type="submit" class="btn btn-dark">Create Post</button>
        </form>


        <small class="d-block text-right mt-3">
          <a href="#">All updates</a>
        </small>
      </div>
    </div>

    <div class="col-sm-2">
      <div class="d-flex align-items-center p-1 mt-5 mb-3 bg-dark rounded box-shadow">
        <div class="m-1 p-1 bg-white rounded box-shadow" style="height: 100%;">
          <p class="mb-0 text-center">Lonely Pokemons in your route!</p>
          <img src="../assets/images/ad-toast.jpg" width="100%" height="auto" alt="Real sexy pokemon"
            class="mr-2 rounded">
          <p class="d-block pl-3 pr-3 font-weight-light">I'm really lonely, my trainer released me because of
            my naughty nature.
            Can you catch me with you Master Ball?
          </p>
          <div class="d-flex align-items-center">
            <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">
              <button type="button" class="btn btn-block btn-outline-dark">
                Use <img src="../assets/images/meme.png" width="15%" height="15%" alt="Real sexy pokemon"
                  class="mr-2 rounded">
              </button>
            </a>
          </div>
        </div>
      </div>
    </div>
</main>

<?php

include '../assets/layouts/footer.php'

  ?>