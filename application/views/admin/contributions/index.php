<div>
  <?php if ($contributions):?>
  <?php $this->table->set_heading('username', 'actions');?>
  <?php foreach ($contributions as $contribution): ?>
    <?php $this->table->add_row(array($user->username));?>
  <?php endforeach; ?>
  <?php echo $this->table->generate(); ?>
<?php endif;?>
</div>
