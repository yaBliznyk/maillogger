<?php

class m171015_083416_create_links_table extends CDbMigration
{
	public function up()
	{
	    $this->createTable('links', [
	        'id' => 'pk',
            'email' => 'string NOT NULL',
            'key' => 'string NOT NULL',
            'created_at' => 'datetime NOT NULL'
        ], 'ENGINE=InnoDB CHARSET=utf8');
	}

	public function down()
	{
		$this->dropTable('links');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}