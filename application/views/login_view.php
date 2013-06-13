<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bangladesh360- Login</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="<?php echo base_url(); ?>/assets/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>/assets/css/bootstrap-responsive.css" rel="stylesheet">
        <style type="text/css">
            body {
                padding-top: 40px;
                padding-bottom: 40px;
                background-color: #f5f5f5;
            }

            .form-signin {
                max-width: 300px;
                padding: 19px 29px 29px;
                margin: 0 auto 20px;
                background-color: #fff;
                border: 1px solid #e5e5e5;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 5px;
                -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
            }
            .form-signin .form-signin-heading,
            .form-signin .checkbox {
                margin-bottom: 10px;
            }
            .form-signin input[type="text"],
            .form-signin input[type="password"] {
                font-size: 16px;
                height: auto;
                margin-bottom: 15px;
                padding: 7px 9px;
            }

        </style>
       
    </head>
    <body>
        <div class="container">
            
            <form name="mainForm" class="form-signin" action="<?php echo site_url('login');?>/verify" method="post" accept-charset="utf-8" >
                <h3 class="form-signin-heading">Sign in to continue</h3>
                <input type="text" class="input-block-level" placeholder="Username" name="username">
                <input type="password" class="input-block-level" placeholder="Password" name="password">
                <?php echo str_replace('<p>','<p class="text-error">', validation_errors()); ?>
                <p></p>
                <button class="btn btn-primary " type="submit">Sign in</button>
            </form>
           
        </div>
    </body>
</html>
