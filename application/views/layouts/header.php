<html>
  <head><title>Marzan</title></head>
  <link rel = "stylesheet" href="/marzan/css/reset-min.css"></link>
  <link rel = "stylesheet" href="/marzan/css/redmond/jquery-ui-1.8.16.custom.css"></link>
  <link rel = "stylesheet" href="/marzan/css/superfish.css"></link>
  <link rel = "stylesheet" href="/marzan/css/superfish-navbar.css"></link>
  <link rel = "stylesheet" href="/marzan/css/application.css"></link>
  <script src="/marzan/js/jquery-1.6.2.js" type="text/javascript"></script>
  <script src="/marzan/js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
  <script src="/marzan/js/hoverIntent.js" type="text/javascript"></script>
  <script src="/marzan/js/superfish.js" type="text/javascript"></script>
  <script src="/marzan/js/application.js" type="text/javascript"></script>
<body>
<div id="header">
  <div class="title">
    <h1>Harvester Church</h1>
  </div>
  <?php if (($this->uri->rsegment(1) != 'users') AND ($this->uri->rsegment(2) != 'login')):?>
    <div>
      <ul class="sf-menu">
        <li><a href="#">Home</a></li>
        <li><a href="#">Consolidation</a></li>
        <li><a href="#">Trainings</a></li>
        <li><a href="#">Production</a></li>
        <li><a href="#">Admin</a></li>
        <li><a href="#">Finance</a>
          <ul>
            <li><a href="#">Collections</a></li>
            <li><a href="#">Expenses</a></li>
            <li><a href="#">Financial Report</a></li>
          </ul>
        </li>
    </ul>
    </div>
  <?php endif;?>
</div>
<div class="clear"></div>
<?php if (($this->uri->rsegment(1) != 'users') AND ($this->uri->rsegment(2) != 'login')):?>
<div id="container">
  <div id="sidebar" class="sidebar">
    <div class="widget ui-widget ui-widget-content">
      <div class="ui-dialog-titlebar ui-widget-header">Add Collection</div>
      <div class="content">
        <p>Add collection form</p>
      </div>
    </div>
  </div>
<?php endif;?>
