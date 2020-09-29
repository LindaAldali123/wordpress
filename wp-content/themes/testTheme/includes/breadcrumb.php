<?php
  $all_cats = get_the_category();

  // echo "<pre>";
  //   print_r($all_cats);
  // echo "</pre>";

?>

<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?php echo get_home_url( )?>">
          <?php bloginfo( 'name' );?>
        </a>
      </li>
      <li class="breadcrumb-item">
        <a href="<?php echo esc_url(get_category_link( $all_cats[0]->term_id ));?>"><?php echo esc_html($all_cats[0]->name);?></a>
      </li>
      <li class="breadcrumb-item active" aria-current="page"><?php the_title();?></li> <!-- or echo get_the_title(); -->
    </ol>
  </nav>
</div>