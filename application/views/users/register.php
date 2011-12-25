<?php load_header(); ?>
<div class="login widget">
  <div class='ui-widget ui-widget-content ui-corner-all'>
    <div class='ui-widget-header ui-corner-all'>User Login</div>
    <div class='ui-widget-content ui-corner-bottom content'>
      <?php echo validation_errors();?>
      <?php echo form_open(site_url('/users/register')) ?>
        <p>
          <label>Username</label>
          <input type="text" name="username" value="<?php echo set_value('username');?>" />
        </p>
        <p>
          <label>Password</label>
          <input type="password" name="password" value="" />
        </p>
        <p>
          <label>Password Confirmation</label>
          <input type="password" name="password_confirmation" value="" />
        </p>
        <p>
          <input type="submit" class="widget-button" value="Sign In" />
        </p>
      </form>
    </div>
  </div>
</div>
<?php load_footer(); ?>
