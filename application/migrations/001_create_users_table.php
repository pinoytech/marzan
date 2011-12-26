<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_users_table extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field('id', TRUE);
    $this->dbforge->add_field(array(
      'username' => array(
        'type' => 'VARCHAR',
        'constraint' => 12
      ),
      'password' => array(
        'type' => 'VARCHAR',
        'constraint' => 12
      ),
      'email' => array(
        'constraint' => 12,
	'type' => 'VARCHAR'
      ),
      'deleted' => array(
	'type' => 'INT'
      )
    ));
		
    $this->dbforge->create_table('users');
  }

  public function down()
  {
    $this->dbforge->drop_table('users');
  }

}
