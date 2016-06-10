<?php get_header(); ?>

<div id="content">
  <div id="box">
    
    <?php if(have_posts()) : ?>
      <?php if(is_category()) : ?>
        <div class="titContDest"><h2>Categoria <em>"<?php single_cat_title(); ?>"</em></h2></div>
      <?php elseif(is_tag()) : ?>
        <div class="titContDest"><h2>Tag <em>"<?php single_tag_title(); ?>"</em></h2></div>
      <?php elseif(is_day()) : ?>
        <div class="titContDest"><h2>Dia <em>"<?php the_time('d \d\e F \d\e Y') ; ?>"</em></h2></div>
      <?php elseif(is_month()) : ?>
        <div class="titContDest"><h2>Mês <em>"<?php the_time('F \d\e Y'); ?>"</em></h2></div>
      <?php elseif(is_year()) : ?>
        <div class="titContDest"><h2>Ano <em>"<?php the_time('Y'); ?>"</em></h2></div>
      <?php elseif(is_author()) : ?>
        <div class="titContDest"><h2>Autor</h2></em></div>
      <?php endif; ?>
      
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
