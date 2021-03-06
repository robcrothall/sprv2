<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<?php
require "sprv_v2/inc/constants.php";
?>
    <head>
        <title><?php echo $_SERVER["SERVER_NAME"]; ?></title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="Keywords" CONTENT="<?php echo $_SERVER["SERVER_NAME"]; ?>, Settlers Park" />
        <meta name="Description" CONTENT="<?php echo $_SERVER["SERVER_NAME"]; ?> is an intranet for Settlers Park" />
        <meta name="Subject" CONTENT="Settlers Park" />
        <meta name="Classification" CONTENT="Lifestyle Retirement Village" />
        <meta name="Abstract" CONTENT="Intranet for Settlers Park Retirement Village" />
        <meta name="author" content="Rob Crothall" />
        <meta name="Copyright" CONTENT="<?php echo date('Y'); ?> Settlers Park Retirement Village" />
        <meta http-equiv="cache-control" content="public" />
        <meta name="Publisher" CONTENT="Settlers Park Retirement Village" />
        <meta name="Robots" CONTENT="ALL" />
        <meta name="Robots" CONTENT="INDEX,FOLLOW" />
        <meta name="GOOGLEBOT" CONTENT="NOARCHIVE" />
        <meta name="Revisit-After" CONTENT="7 Days" />
        <meta name="Distribution" CONTENT="Global" />
        <meta name="Rating" CONTENT="General" />
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" />
        <style type="text/css">
        body {    
            background-color:#0981C0;
            color:#fff;
            padding:0;
            margin:0;
            font-family: "Roboto", arial, sans-serif;
        }
        #content {
            width: 100%;
            height: auto;
            max-width: 100%; /*870px; */
            min-height:559px;
            background-image: url('<?php echo HOME_DIR; ?>/img/parked-bg.jpg');
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
            margin:2% auto 0;
            text-align:center;
            font-size:26px;
        }
        #content h1 {font-size:50px;padding-top:13%;margin-bottom:2%}
        #content a {display:block;border:1px solid #fff;padding:5px 10px;width:260px;text-align:center;color:#fff;margin:0 auto;text-decoration:none;font-size:20px;}
        #content a:hover {background-color:#FE6A12;border:1px solid #FE6A12;}
        #content img{
            display: block;
            height: auto;
            max-width: 90%;
            margin:3% auto 0;
        }

        /* start media queries 767px*/    
        @media(min-width:1px) and (max-width:100%){
            #content {font-size: 16px;}    
            #content h1 {
                margin-top: 0;
                font-size:22px;
                word-wrap: break-word;
            }
        }
        @media(min-width:1px) and (max-width:767px) and (orientation: landscape) {
            #content h1 {
                padding-top:2%;
            }
        }
        </style>
        
    </head>
    <body>
        <section id="content">
            <img src="logo.jpg" alt="Settlers Park logo" />
            <span>
            <a href="https://sacoronavirus.co.za/">Click here</a> to visit the Government's COVID-19 portal at <a href="https://sacoronavirus.co.za/">https://sacoronavirus.co.za</a>
            </span>
            <h2><?php echo WEBSITE; ?></h2>
            is the intranet for Settlers Park Retirement Village.  Authorised access is required.
            <p>
            <a href="<?php echo HOME; ?>/page/login.php">Staff and Residents only</a>
<!--            <p>
            <a href="https://sprverp.co.za/dolibarr">Settlers Park Administration</a>
-->        </section>
    </body>
</html>
