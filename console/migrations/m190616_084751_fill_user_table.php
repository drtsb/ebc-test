<?php

use yii\db\Migration;

/**
 * Class m190616_084751_fill_user_table
 */
class m190616_084751_fill_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->insert( '{{%user}}', [
            'created_at' => time(),
            'updated_at' => time(),
            'username' => 'user1',
            //password = 'user1'
            'password_hash' => '$2y$13$aS9fiX10zcVDP0KKxhUrRe0BxvsxdckHIKZ4CMh3dfcnAgrt3FL8K',
            'auth_key' => 'HHSW1He0Ip6Cjcd6ykJAdnkA1pZd8dRr',
            'email' => 'user1@gmail.com',
            'status' => 10,
            'verification_token' => 'ChCMc0HY1n6vB03Ca6k_68Fr08XNkOUM_1560676428',
        ]);

        $this->insert( '{{%user}}', [
            'created_at' => time(),
            'updated_at' => time(),
            'username' => 'user2',
            //password = 'user2'
            'password_hash' => '$2y$13$eGRqRy5/jI/Xnuq1rcCg6O7RabpElkB8vwSyaYQmJZDpSsUgfv8X.',
            'auth_key' => 'kCP9JlON0Tn41T_ttLX5dOhyvt8mgv1f',
            'email' => 'user2@gmail.com',
            'status' => 10,
            'verification_token' => 'Q-ookwZwp7-jM6TvdP9SIXmViw3cxWmh_1560676444',
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->truncateTable('{{%user}}');
    }

}
