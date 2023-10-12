<?php

define('TITLE', "Welcome");
include '../assets/layouts/header.php';

?>



<main role="main">

  <section class="jumbotron text-center py-5">
    <div class="row">
      <div class="col-sm-10">
        <h1 class="jumbotron-heading mb-4">Welcome</h1>
        <p class="text-muted">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos a aut provident amet vitae facilis
          sapiente
          odio! Doloribus perferendis reprehenderit optio omnis, ducimus magni fuga placeat eius voluptates
          esse
          saepe.

          <hr width="100%" class="my-3">

          <sub>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione hic necessitatibus distinctio
            recusandae, earum animi, natus tempora quam laboriosam ipsum ipsam consequuntur alias autem sit
            repudiandae velit. Numquam, officiis ipsum?
          </sub>

          <hr width="100%" class="my-3">

          <sub>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quod praesentium consequuntur vero
            dolorum
            eaque porro. Sunt, labore et modi tempora totam sapiente assumenda itaque quisquam quod autem
            magni
            quibusdam rem.
          </sub>
        </p>
        <p>
          <a href="#" class="btn btn-primary my-2" target="_blank">button 1</a>
          <a href="#" class="btn btn-secondary my-2" target="_blank">Button 2</a>
        </p>
      </div>

      <div class="col-sm-2 position-sticky">
        <div class="d-flex align-items-center p-1 mb-3 bg-dark rounded box-shadow">
          <div class="m-2 p-2 bg-white rounded box-shadow" style="height: 100%;">
            <p class="mb-0 text-center">Lonely Pokemons in your route!</p>
            <img src="../assets/images/ad-toast.jpg" width="100%" height="auto" alt="Real sexy pokemon"
              class="mr-2 rounded">
            <p class="d-block pl-3 pr-3 font-weight-light">I'm really lonely, my trainer released me because
              of my naughty nature.
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

    </div>
  </section>

  <div class="album py-5">
    <div class="container">

      <div class="text-center text-muted mb-5">
        <h2>Bullshit</h2>
        <hr width="300">
      </div>

      <div class="row">
        <div class="col-md-4">
          <div class="card mb-4 box-shadow">
            <img class="card-img-top" src='../assets/images/random.png' alt="Card image cap">
            <div class="card-body">
              <p class="card-text">BULLSHITS</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="#" class="btn btn-sm btn-outline-secondary" target="_blank">View</a>
                  <a href="#" class="btn btn-sm btn-outline-secondary" target="_blank">Study</a>
                </div>
                <small class="text-muted">[under development]</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4 box-shadow">
            <img class="card-img-top" src='../assets/images/random.png' alt="Card image cap">
            <div class="card-body">
              <p class="card-text">BULLSHITS</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="#" class="btn btn-sm btn-outline-secondary" target="_blank">View</a>
                  <a href="#" class="btn btn-sm btn-outline-secondary" target="_blank">Study</a>
                </div>
                <small class="text-muted">[development concluded]</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4 box-shadow">
            <img class="card-img-top" src='../assets/images/random.png' alt="Card image cap">
            <div class="card-body">
              <p class="card-text">BULLSHITS</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="#" class="btn btn-sm btn-outline-secondary" target="_blank">View</a>
                  <a href="#" class="btn btn-sm btn-outline-secondary" target="_blank">Study</a>
                </div>
                <small class="text-muted">[development concluded]</small>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

</main>


<?php

include '../assets/layouts/footer.php'

  ?>