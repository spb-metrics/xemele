<?php get_header(); ?>

<?php $useds = array(); ?>

<!-- CONTEÚDO -->
<div id="content">

  <!-- DESTAQUE -->
  <?php if(class_exists('covers')) if($covers->have_posts(1)) : ?>
  <div id="highlights">
    <h2 class="titH2">Em destaque</h2>
    <div class="destaque">
      <?php while($covers->have_posts(1)) : $covers->the_post(); ?>
      <?php array_push($useds, $post->ID); ?>
      <div>
        <div class="destImg"><a href="<?php $covers->the_permalink(); ?>" title="<?php $covers->the_title(); ?>"><?php $covers->the_thumb('medium', 'width="198" height="165"'); ?></a></div>
        <div class="destCont">
          <p class="postCatDest"><?php the_category(', '); ?></p>
          <h2><a href="<?php $covers->the_permalink(); ?>" title="<?php $covers->the_title(); ?>"><?php $covers->the_title(); ?></a></h2>
          <p><a href="<?php $covers->the_permalink(); ?>" title="<?php $covers->the_title(); ?>"><?php $covers->the_excerpt(); ?></a></p>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
  <div class="nav"></div>
  <div class="divisaoNav"></div>
  <?php endif; ?>
  
  <!-- PRIMEIRA COLUNA -->
  <?php if(class_exists('covers')) if($covers->have_posts(2)) : ?>
  <div id="box1">
    <h2 class="titH2">Outros destaques</h2>
      <?php while($covers->have_posts(2)) : $covers->the_post(); ?>
      <?php array_push($useds, $post->ID); ?>
      <div class="grupoItem">
        <div class="post">
          <div class="destImg"><a href="<?php $covers->the_permalink(); ?>" title="<?php $covers->the_title(); ?>"><?php $covers->the_thumb('medium', 'width="98" height="99"'); ?></a></div>
          <p class="postCat"><?php the_category(', '); ?></p>
          <h3><a href="<?php $covers->the_permalink(); ?>" title="<?php $covers->the_title(); ?>"><?php $covers->the_title(); ?></a></h3>
          <div class="entry"><?php $covers->the_excerpt(); ?></div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  <?php endif; ?>
  
  <!-- SEGUNDA COLUNA -->
  <?php if(have_posts()) : $enough = false; ?>
  <div id="box2">
  <h2 class="titH2">Últimas publicações</h2>
	<?php while(have_posts() && !$enough) : the_post(); ?>
    <?php if(in_array($post->ID, $useds)) continue; update_post_caches($posts); array_push($useds, $post->ID); ?>
	<?php if(++$a >= 4) $enough = true; ?>
    <div class="grupoItem">
 
      <div class="post">
        <p class="postCat"><?php the_category(', '); ?></p>
        <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
        <div class="entry"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_excerpt(); ?></a></div>
      </div>
    </div>
    <?php endwhile; ?>
  </div>
  <?php endif; ?>
  
  <div class="divisao"></div>
  
  <!-- NUVEM DE TAGS -->
  <div id="box">
    <div class="grupoItem">
      <div class="post">
       <h2 class="titH2">Nuvem de tags</h2>
        <?php wp_tag_cloud('smallest=8&largest=14&number=28'); ?>
      </div>
      <br clear="all" />
    </div>
  </div>
</div>

<?php get_sidebar(); ?>
  
<?php get_footer(); ?>
