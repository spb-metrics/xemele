<?php get_header(); ?>

<div id="content">
  <div id="box">
    
    <?php if(have_posts()) : the_post(); ?>
      <div class="titContDest"><h2><?php the_title(); ?></h2></div>
      <div class="post">
        <div class="entry">
          <?php the_content(); ?>
          <?php if(class_exists('fale_conosco')) $fale_conosco->fc_display(); ?>
        </div>
      </div>
    
    <?php else : ?>
      <div class="titContDest"><h2>404</h2></div>
      <div class="post">
        <h2>Página não encontrada!</h2>
      </div>
    <?php endif; ?>
    
  </div>
  <br clear="all" />
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
