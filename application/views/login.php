<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>IT Asset Management</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="<?php echo base_url('plug/bootstrap/css/bootstrap.min.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('plug/font-awesome/css/font-awesome.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('plug/css/form-elements.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('plug/css/style.css')?>">

        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url('plug/ico/apple-touch-icon-144-precomposed.png')?>">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url('plug/ico/apple-touch-icon-114-precomposed.png')?>">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url('plug/ico/apple-touch-icon-72-precomposed.png')?>">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>
    
        <!-- Top content -->
        <div class="top-content">
            <?php echo $this->session->flashdata('notif') ?>
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>IT Asset Management</strong></h1>
                            
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                          <div class="form-top">
                            <div class="form-top-left">
                              <h3>IT Asset Management</h3>
                                <p>Enter your username and password to log on:</p>
                            </div>
                            <div class="form-top-right">
                              <i class="fa fa-lock"></i>
                            </div>
                            </div>
                            <div class="form-bottom">
                          <form role="form" action="<?php echo base_url('login/aksi_login'); ?>" method="post" class="login-form">
                            <div class="form-group">
                              <label class="sr-only" for="form-username">Username</label>
                                <input type="text"  placeholder="Username..." class="form-username form-control" id="form-username" name="username">
                              </div>
                              <div class="form-group">
                                <label class="sr-only" for="form-password">Password</label>
                                <input type="password"placeholder="Password..." class="form-password form-control" id="form-password" name="password">
                              </div>
                              <button type="submit" class="btn">Sign in!</button>
                          </form>
                        </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="<?php echo base_url('plug/js/jquery-1.11.1.min.js')?>"></script>
        <script src="<?php echo base_url('plug/bootstrap/js/bootstrap.min.js')?>"></script>
        <script src="<?php echo base_url('plug/js/jquery.backstretch.min.js')?>"></script>
        <script src="<?php echo base_url('plug/js/scripts.js')?>"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>