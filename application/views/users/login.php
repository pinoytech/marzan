<?php load_header(); ?>
<div class='ui-widget'>
  <?php echo validation_errors();?>
  <?php echo form_open() ?>
    <p>
      <label>Username</label>
      <input type="text" name="username" value="<?php echo set_value('username');?>" />
    </p>
    <p>
      <label>Password</label>
      <input type="password" name="password" value="" />
    </p>
    <p>
      <input type="submit" value"Sign In" />
    </p>
  </form>
</div>
<?php load_footer(); ?>
