<?php
define('TITLE', "Home");
include '../assets/layouts/header.php';
check_verified();
?>

<?php if ($_SESSION['user_level']== "3" ) { ?>
    <?php include("includes/admin-mod/admin.php") ?>
<?php } elseif ($_SESSION['user_level']== "2" )  { ?>
    <?php include("includes/admin-mod/mod.php") ?>
<?php } else { ?>
    <?php include("includes/users/user.php") ?>
<?php } ?>

<?php
if (isset($_SESSION['ERRORS']))
    $_SESSION['ERRORS'] = NULL;
if (isset($_SESSION['STATUS']))
    $_SESSION['STATUS'] = NULL;
?>


<?php
include '../assets/layouts/footer.php'
?>