<?php

use yii\db\Migration;

/**
 * Class m190616_102950_create_split_table
 */
class m190616_102950_create_split_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%split}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'request' => $this->text()->notNull(),
            'result' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%split}}');
    }

}
