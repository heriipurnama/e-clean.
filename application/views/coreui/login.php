<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="CoreUI Bootstrap 4 Admin Template">
    <meta name="author" content="Lukasz Holeczek">
    <meta name="keyword" content="CoreUI Bootstrap 4 Admin Template">
    <link rel="shortcut icon" href="<?php echo TEMPLATE_ASSETS;?>img/favicon.png">

    <title>e-clean</title>

    <!-- Icons -->
    <link href="<?php echo TEMPLATE_ASSETS;?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo TEMPLATE_ASSETS;?>css/simple-line-icons.css" rel="stylesheet">

    <!-- Main styles for this application -->
    <link href="<?php echo TEMPLATE_ASSETS;?>css/style.css" rel="stylesheet">
    <style>
        body  {
            background-image: url("<?php echo TEMPLATE_ASSETS;?>img/e-cleanDesk.jpeg");
            height: 100%;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body class="app flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card-group mb-0">
                    <div class="card cardLogin p-4">
                        <div class="card-block">
                            <span style="text-align: center;"><h1>Login</h1> </span>
                            <span style="text-align: center;"><p class=""><b>Sign In to your account</b></p></span>
                            <?php if ($this->session->flashdata('msg')) { ?>
                            <p><?php echo $this->session->flashdata('msg');?></p>
                            <?php } ?>
                            <form method="post" action="<?php echo base_url();?>index.php/administrator/login_submit">
                                <div class="input-group mb-3">
                                    <span class="input-group-addon"><i class="icon-user"></i>
                                    </span>
                                    <input type="text" name="username" class="form-control" placeholder="Username / NIK" required>
                                </div>
                                <div class="input-group mb-4">
                                    <span class="input-group-addon"><i class="icon-lock"></i>
                                    </span>
                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btnLogin btn-primary px-4"> <b>Login </b></button>
                                    </div>
                                </div>
                                <br/>
                                <span style="text-align: center;"><h6>&copy; 2020 MIS - Pt. Globalindo.</h6> </span>
                           </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap and necessary plugins -->
    <script src="<?php echo TEMPLATE_ASSETS;?>bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo TEMPLATE_ASSETS;?>bower_components/tether/dist/js/tether.min.js"></script>
    <script src="<?php echo TEMPLATE_ASSETS;?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>