<?php load_header();?>
<div class="ui-widget ui-widget-content ui-corner-all main">
  <div class="ui-widget-header ui-corner-all">Users</div>
  <div class="ui-widget-content ui-corner-bottom content">
    <?php if ($users):?>
    <?php $this->table->set_heading('username', 'actions');?>
    <?php foreach ($users as $user): ?>
      <?php $this->table->add_row(array($user->username, anchor("admin/users/edit/$user->id", "Edit") . ' ' . anchor("admin/users/delete/$user->id", "Delete")));?>
    <?php endforeach; ?>
    <?php echo $this->table->generate(); ?>
    <?php endif;?>
  </div>
</div>
<?php load_footer();?>
