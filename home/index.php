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
                <h6 class="mb-0">Bruh</h6>
                <sub class="text-muted border-bottom border-gray pb-2 mb-0">whatever</sub>

                <div class="media text-muted pt-3">
                    <img src="../assets/images/logonotextwhite.png" width="5%" height="5%" alt="" class="mr-2 rounded">
                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <strong class="d-block text-gray-dark">@somethingsomething</strong>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Architecto, voluptate quaerat! Quasi
                        magni soluta nam voluptatibus dicta consequatur! Accusamus ducimus voluptatem odit error.
                        Pariatur, minus placeat optio doloribus totam sequi!
                    </p>
                </div>
                <div class="media text-muted pt-3">
                    <img src="../assets/images/logonotextwhite.png" width="5%" height="5%" alt="" class="mr-2 rounded">
                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <strong class="d-block text-gray-dark">@somethingsomething</strong>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officiis minus sapiente repellat,
                        obcaecati perspiciatis soluta autem, molestias ipsam recusandae cupiditate ex deleniti
                        accusantium unde rerum, nam et dolore eligendi officia.
                    </p>
                </div>
                <div class="media text-muted pt-3">
                    <img src="../assets/images/logonotextwhite.png" width="5%" height="5%" alt="" class="mr-2 rounded">
                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <strong class="d-block text-gray-dark">@somethingsomething</strong>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non, id laudantium. Quasi architecto
                        unde expedita totam quo vitae provident deleniti eius ut necessitatibus itaque, maxime laborum
                        voluptates tempore corrupti repudiandae?
                    </p>
                </div>

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
                                Use <img src="../assets/images/meme.png" width="15%" height="15%"
                                    alt="Real sexy pokemon" class="mr-2 rounded">
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