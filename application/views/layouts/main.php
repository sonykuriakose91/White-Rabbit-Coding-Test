<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Directory Listing</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?= base_url("assets/bower_components/bootstrap/dist/css/bootstrap.min.css"); ?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?= base_url("assets/bower_components/font-awesome/css/font-awesome.min.css"); ?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url("assets/dist/css/AdminLTE.min.css"); ?>">
        <link rel="stylesheet" href="<?= base_url("assets/dist/css/skins/_all-skins.min.css"); ?>">
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>    
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="#" class="logo">
                </a>
                <nav class="navbar navbar-static-top">
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                        </ul>
                    </div>
                </nav>
            </header>
            <aside class="main-sidebar">
                <section class="sidebar">
                    <ul class="sidebar-menu">
                        <li>
                            <a href="<?= base_url('/listing/add'); ?>">
                                <i class="fa fa-plus-square"></i> <span>Add File</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('/listing/index'); ?>">
                                <i class="fa fa-files-o"></i> <span>Files</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('/listing/index/Deleted'); ?>">
                                <i class="fa fa-files-o"></i> <span>Deleted Files</span>
                            </a>
                        </li>
                    </ul>
                </section>
            </aside>
            <div class="content-wrapper">
                <?php
                if (isset($_view) && $_view)
                    $this->load->view($_view);
                ?>    
            </div>
            <footer class="main-footer">
                <strong>&COPY; Copyright <?= date('Y') ?></strong>
            </footer>
        </div>
        <script src="<?= base_url('assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
        <script src="<?= base_url('assets/bower_components/jquery-ui/jquery-ui.min.js'); ?>"></script>
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <script src="<?= base_url("assets/bower_components/bootstrap/dist/js/bootstrap.min.js"); ?>"></script>
        <script src="<?= base_url("assets/dist/js/adminlte.min.js"); ?>"></script>
    </body>
</html>
