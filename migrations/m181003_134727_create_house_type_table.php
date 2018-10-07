<?php

use yii\db\Migration;

/**
 * Handles the creation of table `house_type`.
 */
class m181003_134727_create_house_type_table extends Migration
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
        
        $this->createTable('house_type', [
            'id' => $this->primaryKey(),
            'type' => $this->string(120)->comment('тип дома')->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('house_type');
    }
}
