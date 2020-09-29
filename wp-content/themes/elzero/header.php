<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?> ">
<title>
<?php wp_title('|','true','right'); ?> 
  <?php bloginfo('name'); ?> </title>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?> " />
<?php wp_head(); ?>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
         </button>
  <div class="navbar-header navbar-left">
    <a class="navbar-brand" href="<?php bloginfo('url') ?>"><?php bloginfo('name') ?></a>
     
     </div>
   <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <?php  elzero_bootstrap_menu() ?>
       </div>
     </div>
       </nav>
         <!--End Navbar-->

      