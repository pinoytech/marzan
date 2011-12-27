<div>
  <?php if ($users):?>
  <?php $this->table->set_heading('username', 'actions');?>
  <?php foreach ($users as $user): ?>
    <?php $this->table->add_row(array($user->username, anchor("admin/users/edit/$user->id", "Edit"), anchor("admin/users/delete/$user->id", "Delete")));?>
  <?php endforeach; ?>
  <?php echo $this->table->generate(); ?>
  <?php endif;?>
</div>
