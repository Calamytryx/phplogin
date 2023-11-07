<?php if (isset($_SESSION['auth'])) { ?>

</body>

<footer id="myFooter">
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <h2 class="logo">
          <a href="../home/" target="_blank">
            <img src="../assets/images/random.png" alt="" width="200" height="200" class="">
          </a>
        </h2>
      </div>
      <div class="col-sm-2">
        <h5>Get started</h5>
        <div>
          <a href="../welcome/" target="_blank">Welcome</a> <br />
          <a href="../login/" target="_blank">Log in</a> <br />
          <a href="../signup/" target="_blank">Sign up</a> <br />
        </div>
      </div>
      <div class="col-sm-2">
        <h5>Features</h5>
        <div>
          <a href="../home/" target="_blank">Home</a> <br />
          <a href="../dashboard/" target="_blank">Dashboard</a> <br />
          <a href="../profile/" target="_blank">Profile</a> <br />
          <a href="../profile-edit/" target="_blank">Edit Profile</a> <br />
        </div>
      </div>
      <div class="col-sm-2">
        <h5>Support</h5>
        <div>
          <a href="../contact/" target="_blank">Contact Us</a> <br />
        </div>
      </div>
      <div class="col-sm-3 my-3">
        <div class="social-networks">
          <a href="https://github.com/Calamytryx" target="_blank">
            <i class="fab fa-github"></i>
          </a>
          <a href="https://www.facebook.com/Calamytryx" target="_blank">
            <i class="fab fa-facebook"></i>
          </a>
          <a href="https://discord.com/invite/CVUPpxJzY5" target="_blank">
            <i class="fab fa-discord"></i>
          </a>
          <a href="https://twitter.com/Calamytryx" target="_blank">
            <i class="fab fa-twitter"></i>
          </a>
        </div>
        <a class="btn btn-defadivt" href="mailto:calamytymytryx@gmail.com" target="_blank">Email Me</a>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <p>
      <a href="#" target="_blank">MYTRYX</a> |
      <a href="#" target="_blank">OUR TEAM</a> |
      <a href="#" target="_blank">Bdivlshits</a>
    </p>
  </div>
</footer>

<footer id="myFooterPhone">
  <div class="d-flex justify-content-center">
    <a href="../home/" target="_blank">
      <img src="../assets/images/random.png" alt="" width="200" height="200" class="">
    </a>
  </div>
  <div class="accordion" id="accordionExample">
    <div class="card">
      <div class="card-header" id="headingOne">
        <button class="container-fluid btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
          aria-expanded="true" aria-controls="collapseOne">
          <h5>Get started</h5>
        </button>
      </div>
      <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
          <div class="text-center d-flex flex-column">
            <a href="../welcome/" target="_blank">Welcome</a> <br />
            <a href="../login/" target="_blank">Log in</a> <br />
            <a href="../signup/" target="_blank">Sign up</a> <br />
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="headingTwo">
        <button class="container-fluid btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo"
          aria-expanded="false" aria-controls="collapseTwo">
          <h5>Features</h5>
        </button>
      </div>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
        <div class="card-body">
          <div class="text-center d-flex flex-column">
            <a href="../home/" target="_blank">Home</a> <br />
            <a href="../dashboard/" target="_blank">Dashboard</a> <br />
            <a href="../profile/" target="_blank">Profile</a> <br />
            <a href="../profile-edit/" target="_blank">Edit Profile</a> <br />
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="headingThree">
        <button class="container-fluid btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree"
          aria-expanded="false" aria-controls="collapseThree">
          <h5>Support</h5>
        </button>
      </div>
      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
        <div class="card-body">
          <div class="text-center d-flex flex-column">
            <a href="../contact/" target="_blank">Contact Us</a> <br />
          </div>
        </div>
      </div>
    </div>
    <div class="justify-content-center">
      <div class="social-networks">
        <a href="https://github.com/Calamytryx" target="_blank">
          <i class="fab fa-github"></i>
        </a>
        <a href="https://www.facebook.com/Calamytryx" target="_blank">
          <i class="fab fa-facebook"></i>
        </a>
        <a href="https://discord.com/invite/CVUPpxJzY5" target="_blank">
          <i class="fab fa-discord"></i>
        </a>
        <a href="https://twitter.com/Calamytryx" target="_blank">
          <i class="fab fa-twitter"></i>
        </a>
      </div>
      <a class="cbtn btn-defadivt text-center" href="mailto:calamytymytryx@gmail.com" target="_blank">Email Me</a>
    </div>

  </div>
  <div class="footer-copyright">
    <p>
      <a href="#" target="_blank">MYTRYX</a> |
      <a href="#" target="_blank">OUR TEAM</a> |
      <a href="#" target="_blank">Bdivlshits</a>
    </p>
  </div>
</footer>

<?php } ?>

<script>
    function updateLabel(input) {
        var label = document.getElementById('file-label');
        if (input.files.length > 0) {
            label.innerText = input.files[0].name;
        } else {
            label.innerText = 'Choose file';
        }
    }
</script>

<script src="../assets/vendor/js/jquery-3.4.1.min.js"></script>
<script src="../assets/vendor/js/jquery-3.4.1.slim.min.js"></script>
<script src="../assets/vendor/js/popper.min.js"></script>
<script src="../assets/vendor/bootstrap-4.3.1/js/bootstrap.min.js"></script>

</body>

</html>

<?php

if (isset($_SESSION['ERRORS']))
$_SESSION['ERRORS'] = NULL;
if (isset($_SESSION['STATUS']))
$_SESSION['STATUS'] = NULL;

?>