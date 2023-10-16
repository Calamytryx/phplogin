<main role="main" class="mr-5 ml-5">
  <div class="row">
    <div class="col-sm-3">

      <?php include('../assets/layouts/profile-card.php'); ?>

    </div>
    <div class="col-sm-9">

      <div class="d-flex align-items-center p-3 mt-5 mb-3 text-white-50 bg-dark rounded box-shadow">
        <img class="mr-3" src="../assets/images/logonotextwhite.png" alt="" width="48" height="48">
        <div class="lh-100">
          <h6 class="mb-0 text-white lh-100">Admin Dashboard -
            <?php
             if(isset($_SESSION['first_name']))
             {
              echo "{$_SESSION['first_name']}";
             }
            ?>
          </h6>
          <small>[Development in Progress]</small>
        </div>
        <div class="borderdb border-none">

        </div>

      </div>
      <div class="my-3 p-3 bg-white rounded box-shadow">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm p-2">
          <div class="container">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a href="?table=user" class="nav-link">Registered Users</a>
                </li>
                <li class="nav-item">
                  <a href="?table=login" class="nav-link">Login History</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>

        <?php
        if (isset($_GET['table'])) {
          if ($_GET['table'] == 'user') {
            include("user-table.php");
          } elseif ($_GET['table'] == 'login') {
            include("login-history.php");
          }
        }
        ?>

        <small class="d-block text-right mt-3">
          <a href="#"><i class="fas fa-redo"></i></a>
        </small>
      </div>

    </div>
  </div>
</main>