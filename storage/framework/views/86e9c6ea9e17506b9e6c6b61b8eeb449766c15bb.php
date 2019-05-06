<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?php echo e(asset('upload')); ?>/header.png" type="image/x-icon"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Trackseries|Home</title>
  </head>

<style>
#lab_social_icon_footer {
  padding: 40px 0;
  background-color: #dedede;
}

#lab_social_icon_footer a {
  color: #333;
}

#lab_social_icon_footer .social:hover {
  -webkit-transform: scale(1.1);
  -moz-transform: scale(1.1);
  -o-transform: scale(1.1);
}

#lab_social_icon_footer .social {
  -webkit-transform: scale(0.8);
  -moz-transform: scale(0.8);
  -o-transform: scale(0.8);
  -webkit-transition-duration: 0.5s;
  -moz-transition-duration: 0.5s;
  -o-transition-duration: 0.5s;
}
/*
    Multicoloured Hover Variations
*/

#lab_social_icon_footer #social-fb:hover {
  color: #3B5998;
}

#lab_social_icon_footer #social-tw:hover {
    color: #4099FF;
}

#lab_social_icon_footer #social-gp:hover {
  color: #d34836;
}

#lab_social_icon_footer #social-em:hover {
    color: #4099FF;
}
    </style>

  <body>


        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <b><a class="navbar-brand" href="#">TRACKSERIES</a></b>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                      <a style="border: 1px solid" class="nav-link mr-1" href="#">About Us<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a style="border: 1px solid" class="nav-link mr-1" href="<?php echo e(route('tsrm.login')); ?>"><i class="fas fa-sign-in-alt"></i>Log In</a>
                    </li>
                    <li class="nav-item">
                      <a style="border: 1px solid" class="nav-link mr-1" href="<?php echo e(route('tsrm.signup')); ?>"><i class="fas fa-user-plus"></i>Sign Up</a>
                    </li>
                  </ul>
                </div>
        </nav>

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="<?php echo e(asset('upload')); ?>/first.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                      <b style="font-family:cursive;color:teal;font-size: large"><h5 style="color:black" >TRACK SERIES</h5></b>
                            <b><p  style="color:black" >Track Your Favorite Series.Never Miss an Episode</p></b>
                          </div>
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo e(asset('upload')); ?>/second.jpg" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                      <b style="font-family:cursive;color:teal;font-size: large"><h5 style="color:black" >MOVIES</h5></b>
                            <b><p  style="color:black" >Check All Exclusive Reviews & Find The Must Watch Movies For You</p></b>
                          </div>
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo e(asset('upload')); ?>/third.jpg" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                            <b style="font-family:cursive;color:teal;font-size: large"><h5 style="color:black" >REVIEW & RATING</h5></b>
                            <b><p  style="color:black" >Share Your Opinions & Rate How Much You Enjoyed</p></b>
                   </div>
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>


               <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                      <h1 style="text-align: center" class="display-4">Track Series & Review Movies</h1>
                      <p class="lead">A dynamic platform to share your thoughts and feelings after watching a movie or series.Help people to choose the must try movie and series.You can also track which episodes have already been watched and what remains</p>
                    </div>
                </div>


                <div class="jumbotron jumbotron-fluid">
                  <h5 style="text-align: center;font-family: Verdana, Geneva, Tahoma, sans-serif;font-display: top;font-size: medium">COMMUNITY</h5>      
                  <div class="container">
                                <button type="button" class="btn btn-primary btn-lg btn-block">
                                        USERS <br><span class="badge badge-light"><?php echo e($user); ?></span>
                                        <span class="sr-only">unread messages</span>
                                </button>

                                <button type="button" class="btn btn-primary btn-lg btn-block">
                                        MOVIES <br><span class="badge badge-light"><?php echo e($movies); ?></span>
                                        <span class="sr-only">unread messages</span>
                                </button>

                                <button type="button" class="btn btn-primary btn-lg btn-block">
                                        SERIES <br><span class="badge badge-light"><?php echo e($series); ?></span>
                                        <span class="sr-only">unread messages</span>
                                </button>

                                <button type="button" class="btn btn-primary btn-lg btn-block">
                                        REVIEWS <br><span class="badge badge-light"><?php echo e($reviews); ?></span>
                                        <span class="sr-only">unread messages</span>
                                </button>

                        </div>
                </div>

                <section id="lab_social_icon_footer">
                        <div class="container">
                                <div class="text-center center-block">
                                        <a href="#"><i id="social-fb" class="fab fa-facebook-square fa-3x social"></i></a>
                                        <a href="#"><i id="social-tw" class="fab fa-twitter-square fa-3x social"></i></a>
                                        <a href="#"><i id="social-gp" class="fab fa-google-plus-square fa-3x social"></i></a>
                                        <a href="#"><i id="social-em" class="fab fa-microsoft fa-3x social"></i></a>
                            </div>
                        </div>
                 </section>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
<?php /* F:\Spring 18-19\ATP 3\FINAL\Project V 26.4.19 - Copy\resources\views/index.blade.php */ ?>