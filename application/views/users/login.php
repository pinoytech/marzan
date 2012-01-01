<?php load_header(); ?>
<div class="login widget">

  <div class="widget ui-widget ui-widget-content">
    <div class="ui-dialog-titlebar ui-widget-header">Add Collection</div>
    <div class="content">
      <?php echo validation_errors();?>
      <?php echo form_open(site_url('/users/login')) ?>
        <p>
          <?php echo form_label('Username', 'username');?>
          <input type="text" name="username" value="<?php echo set_value('username');?>" />
        </p>
        <p>
          <?php echo form_label('Password', 'password');?>
          <input type="password" name="password" value="" />
        </p>
        <p>
          <input type="submit" class="widget-button" value="Sign In" />
        </p>
      </form>
    </div>
  </div>
</div>
<?php load_footer(); ?>
