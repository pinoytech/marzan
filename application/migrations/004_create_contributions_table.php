<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_contributions_table extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field('id', TRUE);
    $this->dbforge->add_field(array(
      'user_id' => array(
        'type' => 'INT'
      ),
      'amount' => array(
        'type' => 'DECIMAL(8,2)'
      ),
      'created_at' => array(
	'type' => 'DATETIME'
      ),
      'updated_at' => array(
	'type' => 'DATETIME'
      )
    ));
		
    $this->dbforge->create_table('contributions');
  }

  public function down()
  {
    $this->dbforge->drop_table('contributions');
  }

}
