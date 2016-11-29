<?php if ( is_active_sidebar('rightbar') ) : ?>
  <?php dynamic_sidebar('rightbar'); ?>
<?php else: ?>
  <div class="sidebar-module"> 
    <h4>Add Your Widgets to this Right Sidebar</h4>
  </div>
<?php endif; ?>