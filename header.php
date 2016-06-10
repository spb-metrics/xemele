<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  
  <!-- Metas -->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="Generator" content="WordPress <?php bloginfo('version'); ?>" />
  <meta name="Description" content="<?php bloginfo('description'); ?>" />
  <meta name="Keywords" content="<?php bloginfo('name'); ?> <?php wp_title(); ?>" />
  <meta name="Robots" content="ALL" />
  <meta name="Distribution" content="Global" />
  <meta name="Language" content="pt-br" />
  <meta name="Author" content="Equipe Web MinC - minc.web@gmail.com" />
  <meta name="Resource-Type" content="Document" />
  <meta name="Classification" content="Governo" />
  
  <!-- Title -->
  <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
  
  <!-- Icon -->
  <!--<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/img/icon/favicon.ico" type="image/x-icon" />-->
  
  <!-- Pingback -->
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  
  <!-- RSS -->
  <link type="application/rss+xml" rel="alternate" href="<?php bloginfo('rss2_url'); ?>" title="feeds de <?php bloginfo('name'); ?>"/>
  <?php if(is_category()) : ?><link type="application/rss+xml" rel="alternate" href="<?php print get_category_feed_link($cat, 'rss2'); ?>" title="feeds de <?php single_cat_title(); ?>" /><?php endif; ?>
  
  <!-- CSS -->
  <link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/geral.css" />
  
  <!-- JavaScript -->
  <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.js"></script>
  <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.cycle.js"></script>
  <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/functions.js"></script>
  
  <?php wp_head(); ?>
</head>

<body>
  <div id="page">
  
    <!-- HEADER -->
    <div id="barraGov"></div>
    <div id="header">
      <div class="headerLeft">
        <h1><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
        <br clear="all" />
      </div>
      <div class="headerRight">
        <ul class="info">
          <li><a href="<?php get_page_link(3); ?>" title="Mapa do site">Mapa do site</a></li>
          <li><a href="<?php get_page_link(5); ?>" title="Fale conosco">Fale conosco</a></li>
        </ul>
        <form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
          <div>
            <p><em>buscar</em></p>
            <input type="text" value="" name="s" class="input" />
            <input type="submit" class="searchsubmit" value="" />
          </div>
        </form>
      </div>
    </div>
    
    <!-- MENU -->
    <div id="menu">
      <ul>
	    <li><a href="<?php bloginfo('url'); ?>" title='home'>Home</a></li>
        <?php wp_list_pages('depth=1&title_li=&sort_column=menu_order'); ?>
      </ul>
    </div>
    
    <!-- DATA E RSS -->
    <div id="data">
      <p><a href="<?php bloginfo('rss2_url'); ?>" title="RSS" class="rss">rss</a><?php print date('j')." de ".__(date('F'))." de ".date('Y'); ?></p>
    </div>
