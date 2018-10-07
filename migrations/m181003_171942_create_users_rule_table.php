<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users_rule`.
 */
class m181003_171942_create_users_rule_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
 
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->createTable('users_rule', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->comment('пользователь')->notNull(),
            'role_id' => $this->integer()->comment('роль')->notNull(),
        ]);
        $this->addForeignKey('usersrule_userid_user_id', 'users_rule', 'user_id', 'user', 'id');
        $this->addForeignKey('usersrule_roleid_role_id', 'users_rule', 'role_id', 'role', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users_rule');
    }
}
