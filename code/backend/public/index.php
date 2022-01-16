<?php

    $database   = 'awesome';
    $user = 'dbuser';
    $password = "[123456]";
    $host       = "mariadb";

    $connection = new PDO("mysql:host={$host};dbname={$database};charset=utf8", $user, $password);
    $sql = "SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_TYPE='BASE TABLE'";
    $query      = $connection->query($sql);
    $tables     = $query->fetchAll(PDO::FETCH_COLUMN);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Docker LAMP Stack</title>

    <!-- Bootstrap Core CSS -->
    <link type="text/css" rel="stylesheet" media="screen" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">    <style type="text/css">
        html body div *.clear{clear: both;}
        html body div *.cl{clear: left;}
        html body div *.cr{clear: right;}

        html body div *.overflow{overflow: auto;}

        html body div *.tl{text-align: left;}
        html body div *.tr{text-align: right;}
        html body div *.tc{text-align: center;}
        html body div *.tj{text-align: justify;}

        html body div *.centered{margin-left: auto; margin-right: auto;}

        html body div *.nopad{padding: 0px;}
        html body div *.nomargin{margin: 0px;}
        html body div *.nounderline, *.nounderline:hover, *.nounderline:active{text-decoration: none;}
        html body div *.nocursor{cursor: default;}
        html body div *.nospots{list-style: none;}

        html body div *.pc10{width: 10%;}
        html body div *.pc20{width: 20%;}
        html body div *.pc25{width: 25%;}
        html body div *.pc30{width: 30%;}
        html body div *.pc33{width: 33%;}
        html body div *.pc40{width: 40%;}
        html body div *.pc50{width: 50%;}
        html body div *.pc60{width: 60%;}
        html body div *.pc66{width: 66%;}
        html body div *.pc70{width: 70%;}
        html body div *.pc75{width: 75%;}
        html body div *.pc80{width: 80%;}
        html body div *.pc90{width: 90%;}
        html body div *.pc100{width: 100%;}

        html body div *.m0{margin: 0px;}
        html body div *.m5{margin: 5px;}
        html body div *.m10{margin: 10px;}
        html body div *.m15{margin: 15px;}
        html body div *.m20{margin: 20px;}
        html body div *.m25{margin: 25px;}
        html body div *.m30{margin: 30px;}
        html body div *.m35{margin: 35px;}
        html body div *.m40{margin: 40px;}
        html body div *.m45{margin: 45px;}
        html body div *.m50{margin: 50px;}

        html body div *.ml0{margin-left: 0px;}
        html body div *.ml5{margin-left: 5px;}
        html body div *.ml10{margin-left: 10px;}
        html body div *.ml15{margin-left: 15px;}
        html body div *.ml20{margin-left: 20px;}
        html body div *.ml25{margin-left: 25px;}
        html body div *.ml30{margin-left: 30px;}
        html body div *.ml35{margin-left: 35px;}
        html body div *.ml40{margin-left: 40px;}
        html body div *.ml45{margin-left: 45px;}
        html body div *.ml50{margin-left: 50px;}

        html body div *.mr0{margin-right: 0px;}
        html body div *.mr5{margin-right: 5px;}
        html body div *.mr10{margin-right: 10px;}
        html body div *.mr15{margin-right: 15px;}
        html body div *.mr20{margin-right: 20px;}
        html body div *.mr25{margin-right: 25px;}
        html body div *.mr30{margin-right: 30px;}
        html body div *.mr35{margin-right: 35px;}
        html body div *.mr40{margin-right: 40px;}
        html body div *.mr45{margin-right: 45px;}
        html body div *.mr50{margin-right: 50px;}

        html body div *.mt0{margin-top: 0px;}
        html body div *.mt5{margin-top: 5px;}
        html body div *.mt10{margin-top: 10px;}
        html body div *.mt15{margin-top: 15px;}
        html body div *.mt20{margin-top: 20px;}
        html body div *.mt25{margin-top: 25px;}
        html body div *.mt30{margin-top: 30px;}
        html body div *.mt35{margin-top: 35px;}
        html body div *.mt40{margin-top: 40px;}
        html body div *.mt45{margin-top: 45px;}
        html body div *.mt50{margin-top: 50px;}

        html body div *.mb0{margin-bottom: 0px;}
        html body div *.mb5{margin-bottom: 5px;}
        html body div *.mb10{margin-bottom: 10px;}
        html body div *.mb15{margin-bottom: 15px;}
        html body div *.mb20{margin-bottom: 20px;}
        html body div *.mb25{margin-bottom: 25px;}
        html body div *.mb30{margin-bottom: 30px;}
        html body div *.mb35{margin-bottom: 35px;}
        html body div *.mb40{margin-bottom: 40px;}
        html body div *.mb45{margin-bottom: 45px;}
        html body div *.mb50{margin-bottom: 50px;}

        html body div *.p0{padding: 0px;}
        html body div *.p5{padding: 5px;}
        html body div *.p10{padding: 10px;}
        html body div *.p15{padding: 15px;}
        html body div *.p20{padding: 20px;}
        html body div *.p25{padding: 25px;}
        html body div *.p30{padding: 30px;}
        html body div *.p35{padding: 35px;}
        html body div *.p40{padding: 40px;}
        html body div *.p45{padding: 45px;}
        html body div *.p50{padding: 50px;}

        html body div *.pl0{padding-left: 0px;}
        html body div *.pl5{padding-left: 5px;}
        html body div *.pl10{padding-left: 10px;}
        html body div *.pl15{padding-left: 15px;}
        html body div *.pl20{padding-left: 20px;}
        html body div *.pl25{padding-left: 25px;}
        html body div *.pl30{padding-left: 30px;}
        html body div *.pl35{padding-left: 35px;}
        html body div *.pl40{padding-left: 40px;}
        html body div *.pl45{padding-left: 45px;}
        html body div *.pl50{padding-left: 50px;}

        html body div *.pr0{padding-right: 0px;}
        html body div *.pr5{padding-right: 5px;}
        html body div *.pr10{padding-right: 10px;}
        html body div *.pr15{padding-right: 15px;}
        html body div *.pr20{padding-right: 20px;}
        html body div *.pr25{padding-right: 25px;}
        html body div *.pr30{padding-right: 30px;}
        html body div *.pr35{padding-right: 35px;}
        html body div *.pr40{padding-right: 40px;}
        html body div *.pr45{padding-right: 45px;}
        html body div *.pr50{padding-right: 50px;}

        html body div *.pt0{padding-top: 0px;}
        html body div *.pt5{padding-top: 5px;}
        html body div *.pt10{padding-top: 10px;}
        html body div *.pt15{padding-top: 15px;}
        html body div *.pt20{padding-top: 20px;}
        html body div *.pt25{padding-top: 25px;}
        html body div *.pt30{padding-top: 30px;}
        html body div *.pt35{padding-top: 35px;}
        html body div *.pt40{padding-top: 40px;}
        html body div *.pt45{padding-top: 45px;}
        html body div *.pt50{padding-top: 50px;}

        html body div *.pb0{padding-bottom: 0px;}
        html body div *.pb5{padding-bottom: 5px;}
        html body div *.pb10{padding-bottom: 10px;}
        html body div *.pb15{padding-bottom: 15px;}
        html body div *.pb20{padding-bottom: 20px;}
        html body div *.pb25{padding-bottom: 25px;}
        html body div *.pb30{padding-bottom: 30px;}
        html body div *.pb35{padding-bottom: 35px;}
        html body div *.pb40{padding-bottom: 40px;}
        html body div *.pb45{padding-bottom: 45px;}
        html body div *.pb50{padding-bottom: 50px;}
        body {
            width: 100%;
            height: 100%;
            font-family: Lora,"Helvetica Neue",Helvetica,Arial,sans-serif;
            color: #fff;
            background-color: #000;
        }

        html {
            width: 100%;
            height: 100%;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 0 0 35px;
            text-transform: uppercase;
            font-family: Montserrat,"Helvetica Neue",Helvetica,Arial,sans-serif;
            font-weight: 700;
            letter-spacing: 1px;
        }

        p {
            margin: 0 0 25px;
            font-size: 18px;
            line-height: 1.5;
        }

        @media(min-width:767px) {
            p {
                margin: 0 0 35px;
                font-size: 20px;
                line-height: 1.6;
            }
        }

        a {
            color: #28c3ab;
            -webkit-transition: all .2s ease-in-out;
            -moz-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
        }

        a:hover,
        a:focus {
            text-decoration: none;
            color: #176e61;
        }

        .light {
            font-weight: 400;
        }

        .navbar {
            margin-bottom: 0;
            border-bottom: 1px solid rgba(255,255,255,.3);
            text-transform: uppercase;
            font-family: Montserrat,"Helvetica Neue",Helvetica,Arial,sans-serif;
            background-color: #000;
        }

        .navbar-brand {
            font-weight: 700;
        }

        .navbar-brand:focus {
            outline: 0;
        }

        .navbar-custom a {
            color: #fff;
        }

        .navbar-custom .nav li a {
            -webkit-transition: background .3s ease-in-out;
            -moz-transition: background .3s ease-in-out;
            transition: background .3s ease-in-out;
        }

        .navbar-custom .nav li a:hover,
        .navbar-custom .nav li a:focus,
        .navbar-custom .nav li.active {
            outline: 0;
            background-color: rgba(255,255,255,.2);
        }

        .navbar-toggle {
            padding: 4px 6px;
            font-size: 16px;
            color: #fff;
        }

        .navbar-toggle:focus,
        .navbar-toggle:active {
            outline: 0;
        }

        @media(min-width:767px) {
            .navbar {
                padding: 20px 0;
                border-bottom: 0;
                letter-spacing: 1px;
                background: 0 0;
                -webkit-transition: background .5s ease-in-out,padding .5s ease-in-out;
                -moz-transition: background .5s ease-in-out,padding .5s ease-in-out;
                transition: background .5s ease-in-out,padding .5s ease-in-out;
            }
        }

        .intro {
            display: table;
            width: 100%;
            height: auto;
            padding: 100px 0;
            text-align: center;
            color: #fff;
            background: url(/img/intro-bg.jpg) no-repeat bottom center scroll;
            background-color: #000;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            -o-background-size: cover;
        }

        .intro-body {
            display: table-cell;
            vertical-align: middle;
        }

        .brand-heading {
            font-size: 40px;
        }

        @media(min-width:767px) {
            .intro {
                height: 100%;
                padding: 0;
            }

            .brand-heading {
                font-size: 100px;
            }

            .intro-text {
                font-size: 25px;
            }
        }

        .btn-circle {
            width: 70px;
            height: 70px;
            margin-top: 15px;
            padding: 7px 16px;
            border: 2px solid #fff;
            border-radius: 35px;
            font-size: 40px;
            color: #fff;
            background: 0 0;
            -webkit-transition: background .3s ease-in-out;
            -moz-transition: background .3s ease-in-out;
            transition: background .3s ease-in-out;
        }

        .btn-circle:hover,
        .btn-circle:focus {
            outline: 0;
            color: #fff;
            background: rgba(255,255,255,.1);
        }

        .page-scroll .btn-circle i.animated {
            -webkit-transition-property: -webkit-transform;
            -webkit-transition-duration: 1s;
            -moz-transition-property: -moz-transform;
            -moz-transition-duration: 1s;
        }

        .page-scroll .btn-circle:hover i.animated {
            -webkit-animation-name: pulse;
            -moz-animation-name: pulse;
            -webkit-animation-duration: 1.5s;
            -moz-animation-duration: 1.5s;
            -webkit-animation-iteration-count: infinite;
            -moz-animation-iteration-count: infinite;
            -webkit-animation-timing-function: linear;
            -moz-animation-timing-function: linear;
        }

        @-webkit-keyframes pulse {
        0 {
            -webkit-transform: scale(1);
            transform: scale(1);
        }

        50% {
            -webkit-transform: scale(1.2);
            transform: scale(1.2);
        }

        100% {
            -webkit-transform: scale(1);
            transform: scale(1);
        }
        }

        @-moz-keyframes pulse {
        0 {
            -moz-transform: scale(1);
            transform: scale(1);
        }

        50% {
            -moz-transform: scale(1.2);
            transform: scale(1.2);
        }

        100% {
            -moz-transform: scale(1);
            transform: scale(1);
        }
        }

        .content-section {
            padding-top: 100px;
        }

        .download-section {
            width: 100%;
            padding: 50px 0;
            color: #fff;
            background: url(../img/downloads-bg.jpg) no-repeat center center scroll;
            background-color: #000;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            -o-background-size: cover;
        }
        .btn {
            display: inline;
            text-transform: uppercase;
            font-family: Montserrat,"Helvetica Neue",Helvetica,Arial,sans-serif;
            font-weight: 400;
            -webkit-transition: all .3s ease-in-out;
            -moz-transition: all .3s ease-in-out;
            transition: all .3s ease-in-out;
        }

        @media(max-width:1199px) {
            ul.banner-social-buttons {
                margin-top: 15px;
            }
        }

        @media(max-width:767px) {
            ul.banner-social-buttons>li {
                display: block;
                margin-bottom: 20px;
                padding: 0;
            }

            ul.banner-social-buttons>li:last-child {
                margin-bottom: 0;
            }
        }

        ::-moz-selection {
            text-shadow: none;
            background: #fcfcfc;
            background: rgba(255,255,255,.2);
        }

        ::selection {
            text-shadow: none;
            background: #fcfcfc;
            background: rgba(255,255,255,.2);
        }

        img::selection {
            background: 0 0;
        }

        img::-moz-selection {
            background: 0 0;
        }
        h1.brand-heading{
            font-size: 70px;
        }
        html body code, html body div.code {
            color: #00ff00;
            white-space: pre;
            background-color: #003300;
            border-radius: 4px;
            font-size: 16px;
        }
    </style>
    <link type="text/css" rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css">
    <!-- Fonts -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- Javascript -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" target="_blank" href="http://bonemvc.delboysplace.co.uk/">
                <i class="fa fa-play-circle"></i>  Try <span class="light">Bone</span> MVC
            </a>
        </div>


        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
            <ul class="nav navbar-nav">
                <li class="page-scroll">
                    <a target="_blank" href="http://awesome.scot:8025/"><i class="fa fa-envelope"></i> MailHog</a>
                </li>
                <li class="page-scroll">
                    <a target="_blank" href="https://github.com/delboy1978uk/lamp"><i class="fa fa-github"></i> Fork</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>


<section class="intro">
    <div class="">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <br><br><br>
                    <img src="/img/skull_and_crossbones.png" />
                    <h1 class="brand-heading">Dock of the Bay</h1>
                    <code>Apache Server on host awesome.scot ports 80 & 443</code>
                    <code>Maria DB with database <?= $database ;?> on host <?= $host ;?> port 3306</code>
                    <code>DB user <?= $user ;?> with password <?= $password ;?></code><br>
                    <code>MailHog on host awesome.scot ports SMTP 1025 HTTP 8025</code><br>
                    <code>XDebug running on port 9001</code>
                    <br>&nbsp;<br>
                    <a class="btn btn-info" href="/info.php"><i class="fa fa-info-circle"></i> PHP Info</a>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
