<?php

use yii\db\Migration;

/**
 * Handles the creation of table `role`.
 */
class m181003_171335_create_role_table extends Migration
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
        
        $this->createTable('role', [
            'id' => $this->primaryKey(),
            'name' => $this->string(120)->comment('название роли')->notNull(),
            'pages' => $this->string()->comment('разрещенные страницы'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('role');
    }
}
