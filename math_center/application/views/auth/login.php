<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet css" href="<?=base_url();?>assets/css/style.css" />
    <link rel="stylesheet css" href="<?=base_url();?>assets/css/font-awesome.min.css" />
    <link rel="stylesheet css" href="<?=base_url();?>assets/css/jquery-ui.min.css" />

    <script type="text/javascript" src="assets/js/jquery.js"></script>
</head>
<body id="login-container" style="background-image:url('<?=base_url();?>assets/images/bg-awan.jpg');">

<div class="login-container">
    <div id="login">
        <div class="login-form">
            <form class="form" method="post" action="<?=base_url();?>auth/check">
                <?php
                    $error = $this->session->flashdata('error');
                    if(isset($error)){
                ?>
                    <div class="alert error"><?php echo $this->session->flashdata('error');?></div>
                <?php } ?>
                <label>Username:</label><br>
                <input type="text" name="username">
                <br>
                <label>Password:</label><br>
                <input type="password" name="password">
                <br>
                <button class="btn">MASUK</button>
            </form>
        </div>
    </div>
</body>
</html>