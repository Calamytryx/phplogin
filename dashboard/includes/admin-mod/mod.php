<main role="main" class="mr-5 ml-5">
  <div class="row">
    <div class="col-sm-3">

      <?php include('../assets/layouts/profile-card.php'); ?>

    </div>
    <div class="col-sm-9">

      <div class="d-flex align-items-center p-3 mt-5 mb-3 text-white-50 bg-dark rounded box-shadow">
        <img class="mr-3" src="../assets/images/logonotextwhite.png" alt="" width="48" height="48">
        <div class="lh-100">
          <h6 class="mb-0 text-white lh-100">Moderator Dashboard</h6>
          <small>[Development in Progress]</small>
        </div>
        <div class="borderdb border-none">

        </div>

      </div>
      <div class="my-3 p-3 bg-white rounded box-shadow">
        <h4 class="mb-0">Registered Users</h4>
        <?php include("user-table.php") ?>

        <small class="d-block text-right mt-3">
          <a href="#">All updates</a>
        </small>
      </div>

    </div>
  </div>
</main>