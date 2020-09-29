<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset')?>">  <!-- charset="UTF-8"  بدالها استدعي دالة -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <title>
    <?php wp_title('>','true','right');
    
        bloginfo('name'); ?>
    </title>
    <?php  wp_head(); ?>
</head>
<body>
    <!-- start navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <?php hasan_bootstrap_menu(); ?>   <!--   walker واقوم بترتيبه حسب الباراميترات واضافة ال ul سوف يعطيني بالبداية  -->

            <!-- collapse استدعائه تحت ال -->

        </div>
    </nav>


    <!-- End navbar -->

