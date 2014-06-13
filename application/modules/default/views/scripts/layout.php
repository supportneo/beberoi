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
                <div id="left_part">

                    <div class="logo"><a href="/"><img src="/assets/img/logo.png" alt="logo" name="logo" /></a></div>
                    <div class="big_box"><h1>Presentation du magasin</h1></div>

                    <div class="sml_box">
                        <h1>Nos services</h1>
                        <ul class="box_list">
                            <li>Le choix de produits</li>
                            <li>Conseil de spécialités</li>
                            <li>Qualité</li>
                            <li>Echange du produit</li>
                            <li>Service après-vente</li>
                        </ul>
                        <div class="clear"></div>
                    </div>

                    <div class="sml_box sml_box_right">
                        <h1>Nos offres</h1>
                        <ul class="box_list">
                            <li>Le club Bébé Roi</li>
                            <li>La liste de naissance</li>
                            <li>Le chèque cadeau</li>
                            <li>Carte de fidélité</li>
                        </ul>
                        <div class="clear"></div>
                    </div>

                    <div class="clear"></div>

                    <div class="big_box marques">
                        <h1>Les marques</h1>
                        <ul class="logo_list">
                            <li><a href="#"><img src="/assets/img/icon1.png" alt="logo" name="logo" /></a></li>
                            <li><a href="#"><img src="/assets/img/icon2.png" alt="logo" name="logo" /></a></li>
                            <li><a href="#"><img src="/assets/img/icon3.png" alt="logo" name="logo" /></a></li>
                            <li><a href="#"><img src="/assets/img/icon4.png" alt="logo" name="logo" /></a></li>
                            <li><a href="#"><img src="/assets/img/icon5.png" alt="logo" name="logo" /></a></li>
                            <li><a href="#"><img src="/assets/img/icon6.png" alt="logo" name="logo" /></a></li>
                            <li><a href="#"><img src="/assets/img/icon7.png" alt="logo" name="logo" /></a></li>
                            <li><a href="#"><img src="/assets/img/icon8.png" alt="logo" name="logo" /></a></li>
                            <li><a href="#"><img src="/assets/img/icon9.png" alt="logo" name="logo" /></a></li>
                            <li><a href="#"><img src="/assets/img/icon10.png" alt="logo" name="logo" /></a></li>
                            <li><a href="#"><img src="/assets/img/icon11.png" alt="logo" name="logo" /></a></li>
                        </ul>
                        <div class="p_lbl">AUTRES MARQUES</div>
                        <div class="clear"></div>
                    </div>


                    <div class="big_box">
                        <h1>Les contacts</h1>
                        <table width="100%" border="0" cellspacing="2" cellpadding="2" class="add_tbl">
                          <tr>
                            <td valign="top"><a href="#"><img src="/assets/img/fb.png" alt="facebook" /></a><p>Rejoignez nous<br />sur Facebook</p></td>
                            <td>&nbsp;</td>
                            <td valign="top"><p>6 rue Lavoisier<br />Ducos - 98800 Nouméa<br />Horaires :<br />Du lundi au vendredi : 8h/18h<br />Samedi : 8h/12h et 14h/17h<br />Tél. 24 95 31</p></td>
                            <td>&nbsp;</td>
                            <td valign="top"><img src="/assets/img/map.png" alt="map" /><p>Plan d'acces</p></td>
                          </tr>
                        </table>
                        <div class="p_lbl">CONTACT</div>
                        <div class="clear"></div>
                    </div>

                    <div class="clear"></div>
                </div>

                <div id="right_part">

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
                jQuery('.sub_btn').click(function(){
                    jQuery('.zend_form').parent('form').submit();
                });

                if(jQuery('.zend_form').children('br')[0]) jQuery('.zend_form').children('br')[0].remove();
            });

        </script>
            
    </body>
</html>


