<?php

class m171015_083438_create_transactions_table extends CDbMigration
{
    public function up()
    {
        $this->createTable('transactions', [
            'id' => 'pk',
            'user_id' => 'int(11) NOT NULL',
            'amount' => 'bigint NOT NULL',
            'created_at' => 'datetime NOT NULL'
        ], 'ENGINE=InnoDB CHARSET=utf8');

        $this->createIndex('user_id', 'transactions', 'user_id');
    }

    public function down()
    {
        $this->dropTable('transactions');
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