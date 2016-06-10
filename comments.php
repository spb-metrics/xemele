<?php if('comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) die ('Please do not load this page directly. Thanks!'); ?>

<?php if(!empty($post->post_password)) : // if there's a password ?>
  <?php if($_COOKIE['wp-postpass_'.COOKIEHASH] != $post->post_password) : // and it doesn't match the cookie ?>
    <p class="nocomments">This post is password protected. Enter the password to view comments.</p>
    <?php  return; ?>
  <?php endif; ?>
<?php endif; ?>



<?php if($comments) : ?>
  <!-- Comentários -->
  <br clear="all" />
  <h2><em><?php comments_number('Nenhum Comentário Publicado', '1 Comentário Publicado', '% Comentários Publicados'); ?></em></h2>
  <ul class="usercomentarios">
    <?php foreach($comments as $comment) : ?>
      <li id="comment-<?php comment_ID(); ?>">    
    <?php if(function_exists('get_avatar')) print get_avatar($comment, $size = '73', $default = 'http://xemele.cultura.gov.br/wp-content/themes/xemele-comunidade/img/wordpress-logo.png'); ?>
        <p class="commentInfo"><?php comment_author_link(); ?> — <?php comment_time("d/m/Y \@ H:i a"); ?> <?php edit_comment_link('Editar'); ?></p>
        <?php if($comment->comment_approved == '0') : ?>
          <em>Seu comentário está aguardando ser aprovado.</em><br />
        <?php endif; ?>
        <?php comment_text() ?>
        <br clear="all" />
      </li>
    <?php endforeach; ?>
  </ul>
  <br clear="all" />
<?php endif; ?>




<?php if($post->comment_status == 'open') : ?>
  <div class="espacoComentInterno">
    <h2>Deixe sua mensagem</h2>
    
    <?php if(get_option('comment_registration') && !$user_ID) : ?>
      <p>Você precisa estar logado para fazer um comentário.</p>
    
    <?php else : ?>
      <form action="<?php print bloginfo('url'); ?>/wp-comments-post.php" method="post">
        
        <p><strong>Mensagem</strong></p>
        <textarea name="comment" id="comment" tabindex="1"></textarea>
        
        <?php if($user_ID) : ?>
          <p>Você está logado como <a href="<?php print bloginfo('url'); ?>/wp-admin/profile.php"><?php print $user_identity; ?></a> (<?php wp_loginout(); ?>)</p>
        
        <?php else : ?>
          <p><label for="author" style="width:60px; display:block; float:left">Nome</label> <input type="text" name="author" id="author" value="<?php print $comment_author; ?>" tabindex="2" /> (obrigatório)</p>
          <p><label for="email" style="width:60px; display:block; float:left">E-mail</label> <input type="text" name="email" id="email" value="<?php print $comment_author_email; ?>" tabindex="3" /> (obrigatório)</p>
          <p><label for="url" style="width:60px; display:block; float:left">Website</label> <input type="text" name="url" id="url" value="<?php print $comment_author_url; ?>" tabindex="4" /></p>
        <?php endif; ?>
        
        <?php if(function_exists('show_authimage')) : ?>
        <p><label for="code" style="width:60px; display:block; float:left">Validador</label> <input type="text" name="code" id="code" value="" tabindex="5" /> <?php print show_authimage(); ?></p>
        <?php endif; ?>
        
        <?php do_action('comment_form', $post->ID); ?>
        <input type="hidden" name="comment_post_ID" value="<?php print $id; ?>" />
        
        <button type="submit" name="submit" tabindex="6" class="submitComent">Enviar</button>
      </form>
    <?php endif; ?>
  </div>

<?php endif; ?>
