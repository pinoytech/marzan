<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_roles_users_table extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field('id', TRUE);
    $this->dbforge->add_field(array(
      'role_id' => array(
        'type' => 'INT'
      ),
      'user_id' => array(
        'type' => 'INT'
      ),
      'created_at' => array(
	'type' => 'DATETIME'
      ),
      'updated_at' => array(
	'type' => 'DATETIME'
      )
    ));
		
    $this->dbforge->create_table('roles_users');
  }

  public function down()
  {
    $this->dbforge->drop_table('roles_users');
  }

}
