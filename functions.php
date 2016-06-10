<?php

// Carregar o arquivo de idioma
//load_theme_textdomain('SP');

// Recuperar a primeira imagem anexada a um post
function the_thumb($post, $size = "medium", $add = "")
{
  global $wpdb;
  
  $thumb = $wpdb->get_row("SELECT ID, post_title FROM {$wpdb->posts} WHERE post_parent = {$post} AND post_mime_type LIKE 'image%' ORDER BY menu_order");
  
  if(!empty($thumb))
  {
    $image = image_downsize($thumb->ID, $size);
    
    print "<img src='{$image[0]}' alt='{$thumb->post_title}' {$add} />";
  }
}

// Limitar caracteres
function limit_chars($content, $length)
{
  $content = strip_tags($content);
  
  if(strlen($content) > $length)
  {
    $content = substr($content, 0, $length);
    $content = substr($content, 0, strrpos($content, " "))."...";
  }
  
  print $content;
}

// Comentários recentes
function recent_comments($category = 0, $max = 10, $length = 50)
{
  global $wpdb;
  
  if(empty($category))
  {
    $comments = $wpdb->get_results("
      SELECT ID, post_title, comment_ID, comment_post_ID, comment_author, comment_content 
      FROM {$wpdb->comments} 
      INNER JOIN {$wpdb->posts} ON (ID = comment_post_ID) 
      WHERE comment_approved = '1' AND comment_type = '' AND post_password = '' 
      ORDER BY comment_ID DESC 
      LIMIT {$max}
    ");
  }
  else
  {
    $comments = $wpdb->get_results("
      SELECT ID, post_title, comment_ID, comment_post_ID, comment_author, comment_content 
      FROM {$wpdb->comments} 
      INNER JOIN {$wpdb->posts} ON (ID = comment_post_ID) 
      INNER JOIN {$wpdb->term_relationships} ON (ID = object_id) 
      WHERE comment_approved = '1' AND comment_type = '' AND post_password = '' AND term_taxonomy_id = '{$category}'
      ORDER BY comment_ID DESC 
      LIMIT {$max}
    ");
  }
  
  foreach($comments as $comment) :
  ?>
    <li>
      <h3><a href="<?php print get_permalink($comment->ID) ?>" title="<?php print $comment->post_title; ?>"><?php print $comment->comment_author; ?></a></h3>
      <p class="entryComentario"><a href="<?php print get_permalink($comment->ID) ?>" title="<?php print $comment->post_title; ?>"><?php print limit_chars($comment->comment_content, $length); ?></a></p>
    </li>
  <?php
  endforeach;
}

?>
