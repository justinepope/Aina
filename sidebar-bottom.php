<?php if ( is_active_sidebar('bottombar') ) : ?>
  <?php dynamic_sidebar('bottombar'); ?>
<?php else: ?>
  <div class="sidebar-module"> 
    <h4>Add Your Widgets to this Bottom Sidebar</h4>
  </div>
<?php endif; ?>