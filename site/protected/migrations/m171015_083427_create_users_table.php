<?php

class m171015_083427_create_users_table extends CDbMigration
{
    public function up()
    {
        $this->createTable('users', [
            'id' => 'pk',
            'name' => 'string NOT NULL',
            'email' => 'string NOT NULL',
            'api_key' => 'string NOT NULL',
            'money' => 'bigint NOT NULL',
            'created_at' => 'datetime NOT NULL'
        ], 'ENGINE=InnoDB CHARSET=utf8');

        $this->createIndex('email', 'users', 'email', true);
        $this->createIndex('api_key', 'users', 'api_key', true);
    }

    public function down()
    {
        $this->dropTable('users');
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