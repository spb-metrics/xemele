<?php get_header(); ?>

<div id="content">
  <div id="box">
    
    <?php if(have_posts()) : ?>
      <div class="titContDest"><h2>Pesquisa <em>"<?php print $s; ?>"</em></h2></div>
      
      <?php while(have_posts()) : the_post(); ?>
        <div class="grupoItem">
          <div class="post">
            <p class="postCat">Publicado em <?php the_time('d \d\e F \d\e Y'); ?></p>
            <div class="destNot"><a href="<?php the_permalink(); ?>"><?php the_thumb($post->ID, 'thumbnail'); ?></a></div>
            <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
            <div class="entry"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_excerpt(); ?></a></div>
          </div>
          <br clear="all" />
        </div>
      <?php endwhile; ?>      
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
