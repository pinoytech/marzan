<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_roles_table extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field('id', TRUE);
    $this->dbforge->add_field(array(
      'role' => array(
        'type' => 'VARCHAR',
        'contrraint' => '12'
      ),
      'created_at' => array(
	'type' => 'DATETIME'
      ),
      'updated_at' => array(
	'type' => 'DATETIME'
      )
    ));
		
    $this->dbforge->create_table('roles');
  }

  public function down()
  {
    $this->dbforge->drop_table('roles');
  }

}
