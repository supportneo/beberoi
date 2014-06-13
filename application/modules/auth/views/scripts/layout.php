<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- basic styles -->
        <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="/assets/css/style.css" rel="stylesheet" />

        <link rel="stylesheet" href="/assets/css/font-awesome.min.css" />

        <!--[if IE 7]>
          <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
        <![endif]-->

        <script src="/assets/js/jquery-1.10.2.min.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>
    </head>

    <body>
        
        <div class="wrapper" id="main-container">

            <section id="main">
                <div id="central_part">

                    <div class="logo"><a href="/"><img src="/assets/img/logo.png" alt="logo" name="logo" /></a></div>

                    <?php if (count($this->messages)) { ?>
                        <div class="alert alert-success">
                            <?php foreach ($this->messages as $no => $message) { ?>
                                <?php if (!is_array($message)) { ?><?php echo $message; ?><?php } ?><br />
                            <?php } ?>
                        </div>
                    <?php } ?>    

                    <?php echo $this->layout()->content; ?>
                
                    <div class="clear"></div>
                </div>
            </section>

            <footer id="footer">

                <ul class="foot_nav">
                <li><a href="#">Mentions légales</a></li>
                <li><a href="#">Conditions générales de vente</a></li>
                </ul>

                <div class="clear"></div>
            </footer>

            <div class="clear"></div>

        </div>

        <?php echo $this->jquery_msg_error; ?>

        <script type="text/javascript">

            jQuery(document).ready(function(){
                
            });

        </script>
            
    </body>
</html>