<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- basic styles -->
        <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="/assets/css/font-awesome.min.css" />

        <!--[if IE 7]>
          <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
        <![endif]-->

        <!-- page specific plugin styles -->

        <link rel="stylesheet" href="/assets/css/jquery-ui-1.10.3.custom.min.css" />

        <!-- fonts -->

        <link rel="stylesheet" href="/assets/css/ace-fonts.css" />

        <!-- ace styles -->

        <link rel="stylesheet" href="/assets/css/ace.min.css" />
        <link rel="stylesheet" href="/assets/css/ace-rtl.min.css" />
        <link rel="stylesheet" href="/assets/css/ace-skins.min.css" />
        <link rel="stylesheet" href="/assets/css/custom.css" />
        <!--[if lte IE 8]>
          <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
        <![endif]-->
        <script src="/assets/js/ace-extra.min.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>
        <script src="/assets/js/jquery-1.10.2.min.js"></script>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

        <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.js"></script>
        <script src="assets/js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <div class="navbar navbar-default" id="navbar">
            <script type="text/javascript">
                try {
                    ace.settings.check('navbar', 'fixed')
                } catch (e) {
                }
            </script>

            <div class="navbar-container" id="navbar-container">
                <div class="navbar-header pull-left">
                    <a href="#" class="navbar-brand">
                        <small>
                            <i class="icon-leaf"></i>
                            Beberoi
                        </small>
                    </a><!-- /.brand -->
                </div><!-- /.navbar-header -->

                <div class="navbar-header pull-right" role="navigation">
                    <ul class="nav ace-nav">

                        

                        <li class="divider"></li>

                        <li>
                            <a href="/auth/index/deconnexion">
                                <i class="icon-off"></i>
                                Déconnexion
                            </a>
                        </li>
                    </ul>
                    </li>
                    </ul><!-- /.ace-nav -->
                </div><!-- /.navbar-header -->
            </div><!-- /.container -->
        </div>

        <div class="main-container" id="main-container">
            <script type="text/javascript">
                try {
                    ace.settings.check('main-container', 'fixed')
                } catch (e) {
                }
            </script>

            <div class="main-container-inner">
                <a class="menu-toggler" id="menu-toggler" href="#">
                    <span class="menu-text"></span>
                </a>

                <div class="sidebar" id="sidebar">
                    <script type="text/javascript">
                        try {
                            ace.settings.check('sidebar', 'fixed')
                        } catch (e) {
                        }
                    </script>
<?php if($this->id_client) { ?>
                    <ul class="nav nav-list">
                        <li><a href="/extranet/"><i class="icon-dashboard"></i><span class="menu-text"> Accueil </span></a></li>
                        <li><a href="/extranet/listenaissance"><i class="icon-dashboard"></i><span class="menu-text"> Liste de naissances </span></a></li>
                        <li><a href="/extranet/paiement"><i class="icon-dashboard"></i><span class="menu-text"> Liste des paiements </span></a></li>
                        <li><a href="/extranet/paiement/achats"><i class="icon-dashboard"></i><span class="menu-text"> Liste de mes achats </span></a></li>
                        <li><a href="/extranet/compte"><i class="icon-dashboard"></i><span class="menu-text"> Voir mon compte </span></a></li>
                        <li><a href="/extranet/compte/modifier"><i class="icon-dashboard"></i><span class="menu-text"> Modifier mon compte </span></a></li>
                    </ul><!-- /.nav-list -->
<?php } ?>

                    <div class="sidebar-collapse" id="sidebar-collapse">
                        <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
                    </div>

                    <script type="text/javascript">
                        try {
                            ace.settings.check('sidebar', 'collapsed')
                        } catch (e) {
                        }
                    </script>
                </div>

                <div class="main-content">
                    <div class="breadcrumbs" id="breadcrumbs">
                        <script type="text/javascript">
                            try {
                                ace.settings.check('breadcrumbs', 'fixed')
                            } catch (e) {
                            }
                        </script>

                        <ul class="breadcrumb">
                            <li>
                                <i class="icon-home home-icon"></i>
                                <a href="/">Accueil</a>
                            </li>
                    </ul><!-- .breadcrumb -->

                    </div>

                    <div class="page-content">

                        <?php if (count($this->messages)) { ?>
                            <div class="alert alert-success">
                                <?php foreach ($this->messages as $no => $message) { ?>
                                    <?php if (!is_array($message)) { ?><?php echo $message; ?><?php } ?><br />
                                <?php } ?>
                            </div>
                        <?php } ?>    

                        <?php echo $this->layout()->content; ?>
                    </div>
                </div><!-- /.main-content -->

                            </div><!-- /.main-container-inner -->

            <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                <i class="icon-double-angle-up icon-only bigger-110"></i>
            </a>
        </div><!-- /.main-container -->

        <!-- basic scripts -->

        <!--[if !IE]> -->

        <script type="text/javascript">
            window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>" + "<" + "/script>");
        </script>

        <!-- <![endif]-->

        <!--[if IE]>
<script type="text/javascript">
window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

        <script type="text/javascript">
            if ("ontouchend" in document)
                document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
        </script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/typeahead-bs2.min.js"></script>

        <!-- page specific plugin scripts -->

        <script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
        <script src="assets/js/jquery.slimscroll.min.js"></script>

        <!-- ace scripts -->

        <script src="assets/js/ace-elements.min.js"></script>
        <script src="assets/js/ace.min.js"></script>

        <!-- inline scripts related to this page -->

        <script type="text/javascript">
            jQuery(function($) {
                $('.accordion').on('hide', function(e) {
                    $(e.target).prev().children(0).addClass('collapsed');
                })
                $('.accordion').on('show', function(e) {
                    $(e.target).prev().children(0).removeClass('collapsed');
                })
            });
        </script>
        <?php echo $this->jquery_msg_error; ?>    
    </body>

</html>


