<?php load_header();?>
<div class="main">
  <div class="widget ui-widget ui-widget-content">
    <div class="ui-dialog-titlebar ui-widget-header">Add Collection</div>
    <div class="content">
      <?php echo form_open(site_url('admin/financecontributions/'));?>
        <div class="search form">
          <p>
            <?php echo form_label('PO Number', 'po_number');?>
            <br />
            <?php echo form_input('first_digits', '', "maxlength='2' class='two'");?> - 
            <?php echo form_input('last_digits', '', "maxlength='5' class='five'");?>
          </p>
          <p>
            <?php echo form_label('Username', 'username');?>
            <br />
            <?php echo form_input('username', '');?>
          </p>
        </div>
        <p>
          <?php echo form_label('Username', 'username');?>
          <?php echo form_input('username', '', "class='datepicker'");?>
        </p>
      </form>
    </div>
  </div>
</div>
<?php load_footer();?>
