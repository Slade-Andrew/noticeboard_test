<?php

namespace Fuel\Migrations;

class Create_notices
{
	public function up()
	{
		\DBUtil::create_table('notices', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'nb_title' => array('constraint' => 255, 'type' => 'varchar'),
			'nb_message' => array('type' => 'text'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('notices');
	}
}