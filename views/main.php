<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/bootstrap.css">


    <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/register-login.css">
    <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/my-style.css">
    <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/form.css">
    <!-- <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/dropzone.css"></link> -->


    <script src="<?php echo ROOT_PATH; ?>assets/js/jquery.js"></script>
    <script src="<?php echo ROOT_PATH; ?>assets/js/jquery.validate.js"></script>

    <script src="<?php echo ROOT_PATH; ?>assets/js/jquery-validation-messages.js"></script>


    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/bootstrap-sociaal.css">

    <style type="text/css">
        .carousel {
            background: #2f4357;
        }

        .carousel .item {
            min-height: 280px; /* Prevent carousel from being distorted if for some reason image doesn't load */
        }

        .carousel .item img {
            margin: 0 auto; /* Align slide image horizontally center */
        }

    </style>
</head>
<body>

<!-- Home -->
<header>
    <nav class="navbar navbar-inverse navbar-mod">
        <div class="container-fluid">
            <div class="vesco-nav-wrapper">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo ROOT_URL; ?>"><span>Real</span> Estate KS</a>
                </div>

                <div class="collapse navbar-collapse" id="vesco-menu">
                    <ul class="nav navbar-nav navbar-right scrollspy smooth-scroll">
                        <li><a class="smooth-scroll" href="<?php echo ROOT_URL; ?>">Ballina</a></li>
                        <li><a class="smooth-scroll" href="<?php echo ROOT_URL; ?>props/1">Pronat</a></li>

                        <?php if (isset($_SESSION['is_logged_in'])) : ?>

                            <li><a class="smooth-scroll" href="<?php echo ROOT_URL; ?>shares/add">Posto</a></li>
                            <li style="padding-right: 0;"><a class="smooth-scroll"
                                                             style="font-weight: bold; margin-right: 0;"
                                                             href="<?php echo ROOT_URL; ?>">Welcome</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" type="button" data-toggle="dropdown"
                                   style="cursor: pointer;">

                                    <?php echo $_SESSION['user_data']['username']; ?>

                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">

                                    <?php if ($_SESSION['user_data']['level'] == 2): ?>
                                        <li><a href="<?php echo ROOT_URL; ?>admin/panel/1">Property Approval</a></li>
                                    <?php else : ?>
                                        <li><a href="<?php echo ROOT_URL; ?>profile/post">Menaxho shpalljet</a></li>
                                        <li><a href="<?php echo ROOT_URL; ?>profile/profileinfo">Profile</a></li>
                                    <?php endif ?>


                                    <li class="divider"></li>
                                    <li><a href="<?php echo ROOT_URL; ?>users/logout">Ç'kyqu</a></li>
                                </ul>
                            </li>
                        <?php else : ?>

                            <li><a class="smooth-scroll" href="<?php echo ROOT_URL; ?>users/login">Login</a></li>
                            <li><a class="smooth-scroll" href="<?php echo ROOT_URL; ?>users/register">Register</a></li>

                        <?php endif; ?>
                    </ul>
                </div>
            </div>
    </nav>
</header>


<?php Messages::display(); ?>
<?php require($view); ?>


<!-- begin:footer -->
<div id="footer">
    <div class="container">
        <!-- begin:copyright -->
        <div class="row">
            <div class="col-sm-12 copyright">
                <p>&copy;<?php echo date('Y'); ?> Real Estate KS </p>
                <aside id="sticky-social">
                    <a class="btn btn-social-icon btn-facebook">
                        <span class="fa fa-facebook"></span>
                    </a>
                    <a class="btn btn-social-icon btn-google">
                        <span class="fa fa-google"></span>
                    </a>
                </aside>
                <address>
                    Telp. : +62-345678910<br>
                    Email : info@realestateks.com
                </address>
            </div>
        </div>
    </div>
</div>
<!-- end:footer -->


<!-- Slide-script -->
<!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src="assets/js/slide-script.js"></script> -->


<!--Footer ends here -->


<!-- <script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAik6r09yzvTskaT_CSc2fBw1vDwP0GahQ&callback=initMap">
</script> -->

<script>
    $("#reg-form").validate();
    $(".form-signin").validate();
    $("#form1").validate();
    $("#form2").validate();
    $("#cont-form").validate();
    $("#image-upload").validate();
    $("#forgot_from").validate();
    $("#profile-form").validate();
</script>

<script src="<?php echo ROOT_PATH; ?>assets/js/jquery.js"></script>
<!-- Bootstrap js-->
<script src="<?php echo ROOT_PATH; ?>assets/js/bootstrap/bootstrap.min.js"></script>

<script src="<?php echo ROOT_PATH; ?>assets/js/script.js"></script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</body>
</html>