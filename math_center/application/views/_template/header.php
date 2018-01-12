<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php if($title != null || $title != "") echo $title . " - Mathematic Center"; else echo "Mathematic Center";?></title>
    <link rel="stylesheet css" href="<?=base_url();?>assets/css/style.css" />
    <link rel="stylesheet css" href="<?=base_url();?>assets/css/font-awesome.min.css" />
    <link rel="stylesheet css" href="<?=base_url();?>assets/css/jquery-ui.min.css" />

    <script type="text/javascript" src="<?=base_url();?>assets/js/jquery.js"></script>
</head>
<body>

<div id="container">
    <div id="header">
        <div class="header-brand">
        Mathematic Center
        </div>
        <div class="header-menu">
            <img class="avatar" src="<?=base_url();?>assets/images/avatar.png" /> <?php echo $user->nama;?> | <a href="<?=base_url();?>auth/logout">Logout</a> <i class="fa fa-sign-out"></i>
        </div>
        <div class="clear"></div>
    </div>
