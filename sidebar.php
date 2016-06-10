<!-- Sidebar -->
<div id="sidebar">
  <div class="boxRight">
    
    <!-- Categories -->
    <h2 class="titCategorias">Categorias</h2>
    <ul class="categorias">
      <?php wp_list_categories('depth=1&orderby=id&title_li=&use_desc_for_title=0&hide_empty=0'); ?>
    </ul>
    <br clear="all" />
    
    <!-- Links -->
    <h2 class="titLinks">Links</h2>
    <ul class="links">
      <?php wp_list_bookmarks('title_li=&categorize=0&before=<li>&after=</li>&show_images=0'); ?>
    </ul>
    <br clear="all" />
    
    <!-- Last Comments -->
    <h2 class="titComentarios">Últimos Comentários</h2>
    <ul class="comentarios">
      <?php recent_comments(0, 5); ?>
    </ul>
    <br clear="all" />
    
  </div>
</div>
