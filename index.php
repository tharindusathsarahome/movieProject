<?php
 require('php/Main/session.php');
 ?>

<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <title>MovieHub</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <link rel="profile" href="#">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone-no">
    <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/plugins.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        @media only screen and (max-width: 620px) {
         * {
            width: 100%;
          }
        }
	</style>
</head>

<body>
    <!--preloading-->
    <div id="preloader">
			<section class="wrapper">
			  <div class="spinner">
				<i></i>
				<i></i>
				<i></i>
				<i></i>
				<i></i>
				<i></i>
				<i></i>
			  </div>
			</section>
    </div>
    <!--end of preloading-->

    <!--login form popup-->
    <div class="login-wrapper" id="login-content">
        <div class="login-content">
            <a href="#" class="close">x</a>
            <h3>Login To BestMovie.com</h3>
            <form role="form" method="post" action="php/Main/processlogin.php">
                <div class="row">
                    <label for="username">
                    Enter Phone Number or Email:
                    <input type="text" placeholder="E-mail" name="email" type="email" required="required" autofocus>
                </label>
                </div>

                <div class="row">
                    <label for="password">
                    Enter Password:
                    <input type="password" placeholder="Password" name="password" id="password" required="required">
                </label>
                </div>
                <div class="row">
                    <div class="remember">
                        <div>
                            <input type="checkbox" name="remember" value="Remember me"><span>Remember me</span>
                        </div>
                        <a href="#">Forget password ?</a>
                    </div>
                </div>
                <div class="row">
                    <button name="btnlogin" type="submit">Login</button>
                </div>
            </form>

        </div>
    </div>
    <!--end of login form popup-->

<!-- BEGIN | Header -->
<header class="ht-header">
    <div class="container">
        <nav class="navbar navbar-default navbar-custom">
            <div class="navbar-header logo">
                <div class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <div id="nav-icon1">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <a href="index.php"><img class="logo" src="images/logo1.png" alt="" width="350" height="100"></a>
            </div>
            <div class="collapse navbar-collapse flex-parent" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav flex-child-menu menu-left">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li><a href="index.php">Home</a></li>
                    <li class="dropdown first">
                        <a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
                        My selections <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                        <ul class="dropdown-menu level1">
                            <li><a href="SuggestedMovies.php">Best Movies for me</a></li>
                            <li><a href="SelectedMovies.php">My Favourit Movies</a></li>
                            <li class="it-last"><a href="RejectedMovies.php">Rejected Movies</a></li>
                        </ul>
                    </li>
                    <li class="dropdown first">
                        <a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
                        Community <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                        <ul class="dropdown-menu level1">
                            <li><a href="#">Users Feedback</a></li>
                            <li class="it-last"><a href="#">User favorite list</a></li>
                        </ul>
                    </li>
                </ul>
                <?php if (logged_in()) { ?>
                    <ul class="nav navbar-nav flex-child-menu menu-right">
                        <li class="dropdown first">
                            <a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
                            Profile <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                            <ul class="dropdown-menu level1">
                                <li><a href="Profile.php">My Profile</a></li>
                                <li class="it-last"><a href="php/Main/LogOut.php">Sign Out</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php } ?>
                <?php if (!logged_in()) { ?>
                <ul class="nav navbar-nav flex-child-menu menu-right">
                    <li class="btn loginLink"><a href="#">LOG In</a></li>
                    <li><a href="Register.php">sign up</a></li>
                </ul>
                <?php } ?>
            </div>
        </nav>
        <!-- top search form -->
        <div class="top-search">
            <input type="text" placeholder="Search Any Movie or TV series">
        </div>
    </div>
</header>
<!-- END | Header -->

    <div class="slider movie-items">
        <div class="container">
            <?php if (logged_in()) { ?>
                <div class="headder">Hi, <?php echo  $_SESSION['FIRST_NAME']. ' '.$_SESSION['LAST_NAME'] ;?></div>
            <?php } ?>
            <div class="row">
                <!-- <div class="social-link">
                    <p>Follow us: </p>
                    <a href="#"><i class="ion-social-facebook"></i></a>
                    <a href="#"><i class="ion-social-twitter"></i></a>
                    <a href="#"><i class="ion-social-googleplus"></i></a>
                    <a href="#"><i class="ion-social-youtube"></i></a>
                </div> -->
                <div class="slick-multiItemSlider">
                    <div class="movie-item">
                        <div class="mv-img">
                            <a href="#"><img src="images/uploads/slider1.jpg" alt="" width="285" height="437"></a>
                        </div>
                        <div class="title-in">
                            <div class="cate">
                                <span class="blue"><a href="#">Sci-fi</a></span>
                            </div>
                            <h6><a href="#">Interstellar</a></h6>
                            <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                        </div>
                    </div>
                    <div class="movie-item">
                        <div class="mv-img">
                            <a href="#"><img src="images/uploads/slider2.jpg" alt="" width="285" height="437"></a>
                        </div>
                        <div class="title-in">
                            <div class="cate">
                                <span class="yell"><a href="#">action</a></span>
                            </div>
                            <h6><a href="#">The revenant</a></h6>
                            <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                        </div>
                    </div>
                    <div class="movie-item">
                        <div class="mv-img">
                            <a href="#"><img src="images/uploads/slider3.jpg" alt="" width="285" height="437"></a>
                        </div>
                        <div class="title-in">
                            <div class="cate">
                                <span class="green"><a href="#">comedy</a></span>
                            </div>
                            <h6><a href="#">Die hard</a></h6>
                            <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                        </div>
                    </div>
                    <div class="movie-item">
                        <div class="mv-img">
                            <a href="#"><img src="images/uploads/slider4.jpg" alt="" width="285" height="437"></a>
                        </div>
                        <div class="title-in">
                            <div class="cate">
                                <span class="blue"><a href="#">Sci-fi</a></span> <span class="orange"><a href="#">advanture</a></span>
                            </div>
                            <h6><a href="#">The walk</a></h6>
                            <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                        </div>
                    </div>
                    <div class="movie-item">
                        <div class="mv-img">
                            <a href="#"><img src="images/uploads/slider2.jpg" alt="" width="285" height="437"></a>
                        </div>
                        <div class="title-in">
                            <div class="cate">
                                <span class="yell"><a href="#">New</a></span>
                            </div>
                            <h6><a href="#">The revenant</a></h6>
                            <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                        </div>
                    </div>
                    <div class="movie-item">
                        <div class="mv-img">
                            <img src="images/uploads/slider3.jpg" alt="" width="285" height="437">
                        </div>
                        <div class="title-in">
                            <div class="cate">
                                <span class="green"><a href="#">Triller</a></span>
                            </div>
                            <h6><a href="#">Die hard</a></h6>
                            <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="movie-items">
        <div class="container">
            <div class="row ipad-width">
                <div class="col-md-2">
                    <div class="ads">
                        <img src="images/uploads/ads3.png" alt="">
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="title-hd">
                        <h2>Latest Movies</h2>
                        <a href="#" class="viewall">View all <i class="ion-ios-arrow-right"></i></a>
                    </div>
                    <div class="tabs">
                        <ul class="tab-links">
                            <li class="active"><a href="#tab1">#Popular</a></li>
                            <li><a href="#tab2"> #Top rated</a></li>
                            <li><a href="#tab3"> #Most reviewed</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab1" class="tab active">
                                <div class="row">
                                    <div class="slick-multiItem">
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="images/uploads/mv-item2.jpg" alt="" width="185" height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">The revenant</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="images/uploads/mv-item3.jpg" alt="" width="185" height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Die hard</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="images/uploads/mv-item4.jpg" alt="" width="185" height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">The walk</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="images/uploads/mv-item5.jpg" alt="" width="185" height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Interstellar</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="images/uploads/mv-item6.jpg" alt="" width="185" height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">The revenant</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="tab2" class="tab">
                                <div class="row">
                                    <div class="slick-multiItem">
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="images/uploads/mv-item5.jpg" alt="" width="185" height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Interstellar</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="images/uploads/mv-item6.jpg" alt="" width="185" height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">The revenant</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="images/uploads/mv-item7.jpg" alt="" width="185" height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Die hard</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="images/uploads/mv-item8.jpg" alt="" width="185" height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">The walk</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="images/uploads/mv-item3.jpg" alt="" width="185" height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Die hard</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="tab3" class="tab">
                                <div class="row">
                                    <div class="slick-multiItem">
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="images/uploads/mv-item1.jpg" alt="" width="185" height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Interstellar</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="images/uploads/mv-item2.jpg" alt="" width="185" height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">The revenant</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="images/uploads/mv-item3.jpg" alt="" width="185" height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Die hard</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="images/uploads/mv-item4.jpg" alt="" width="185" height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">The walk</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="images/uploads/mv-item3.jpg" alt="" width="185" height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Die hard</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="title-hd">
                        <h2>lastest tv series</h2>
                        <a href="#" class="viewall">View all <i class="ion-ios-arrow-right"></i></a>
                    </div>
                    <div class="tabs">
                        <ul class="tab-links-2">
                            <li><a href="#tab21">#Popular</a></li>
                            <li class="active"><a href="#tab22"> #Top rated </a></li>
                            <li><a href="#tab23">  #Most reviewed  </a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab21" class="tab">
                                <div class="row">
                                    <div class="slick-multiItem">
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="images/uploads/mv-item1.jpg" alt="" width="185" height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Interstellar</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="images/uploads/mv-item2.jpg" alt="" width="185" height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">The revenant</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="tab22" class="tab active">
                                <div class="row">
                                    <div class="slick-multiItem">
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="images/uploads/mv-item6.jpg" alt="" width="185" height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">The revenant</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="images/uploads/mv-item7.jpg" alt="" width="185" height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Die hard</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="images/uploads/mv-item8.jpg" alt="" width="185" height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">The walk</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="images/uploads/mv-item1.jpg" alt="" width="185" height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Interstellar</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="images/uploads/mv-item2.jpg" alt="" width="185" height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">The revenant</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="tab23" class="tab">
                                <div class="row">
                                    <div class="slick-multiItem">
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="images/uploads/mv-item1.jpg" alt="" width="185" height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Interstellar</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="images/uploads/mv-item2.jpg" alt="" width="185" height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">The revenant</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="images/uploads/mv-item3.jpg" alt="" width="185" height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Die hard</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="images/uploads/mv-item4.jpg" alt="" width="185" height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">The walk</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="ads">
                        <img src="images/uploads/ads3.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- latest new v1 section-->
    <div class="latestnew">
        <div class="container">
            <div class="row ipad-width">
                <div class="col-md-8">
                    <div class="ads">
                        <img src="images/uploads/ads2.png" alt="" width="728" height="106">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="sb-twitter sb-it">
                            <h4 class="sb-title">Post to us</h4>
                            <div class="slick-tw">
                                <div class="tweet item" id="">
                                    <!-- Put your twiter id here -->
                                    <p>v</p>
                                </div>
                                <div class="tweet item" id="">
                                    <!-- Put your 2nd twiter account id here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end of latest new v1 section-->


<!-- footer section-->
<footer class="ht-footer">
    <div class="container">
        <div class="flex-parent-ft">
            <div class="flex-child-ft item1">
                 <a href="index.php"><img class="logo" src="images/logo1.png" alt=""></a>
                 <p>BestMovie.com<br>
                 Polpala, Olaganduwa, Alawwa.</p>
                <p>Call us: <a href="#">(+94) 711 234 5678</a></p>
            </div>
            <div class="flex-child-ft item1">
                <h4>Profile</h4>
                <ul>
                    <li><a href="#">My Profile</a></li>
                </ul>
            </div>
            <div class="flex-child-ft item2"></div>
            <div class="flex-child-ft item3"></div>
            <div class="flex-child-ft item4">
                <h4>About</h4>
                <ul>
                    <li><a href="#">About Us</a></li> 
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Help Center</a></li>
                </ul>
            </div>
            <div class="flex-child-ft item5"></div>
        </div>
    </div>
    <div class="ft-copyright">
        <div class="backtotop">
            <p><a href="#" id="back-to-top">Back to top  <i class="ion-ios-arrow-thin-up"></i></a></p>
        </div>
    </div>
</footer>
<!-- end of footer section-->

<script src="js/jquery.js"></script>
<script src="js/plugins.js"></script>
<script src="js/plugins2.js"></script>
<script src="js/custom.js"></script>
</body>

<!-- userfavoritelist14:04-->
</html>