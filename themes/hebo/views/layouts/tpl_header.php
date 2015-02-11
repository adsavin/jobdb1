<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo Yii::app()->name; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Simpson Moyo - Webapplicationthemes.com">

        <?php
        $baseUrl = Yii::app()->theme->baseUrl;
        $cs = Yii::app()->getClientScript();
        Yii::app()->clientScript->registerCoreScript('jquery');
        ?>
        <script type="text/javascript" src="<?php echo $baseUrl; ?>/js/jquery.validation.min.js"></script>

        <!-- the styles -->
        <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/js/nivo-slider/themes/default/default.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/js/nivo-slider/nivo-slider.css" >
        <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/js/lightbox/css/lightbox.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/template.css" media="screen">   
        <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/style1.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/jquery.validation.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/print/print.css" media="print" />

        <!-- The fav and touch icons -->
        <link rel="shortcut icon" href="<?php echo $baseUrl; ?>/img/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $baseUrl; ?>/img/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $baseUrl; ?>/img/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $baseUrl; ?>/img/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo $baseUrl; ?>/img/ico/apple-touch-icon-57-precomposed.png">                
    </head>

    <body>
        <section id="header">            
            <?php include_once('header.php'); ?>            
        </section> 