<?php

use yii\db\Migration;

/**
 * Handles the creation of table `street`.
 */
class m181003_171235_create_street_table extends Migration
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
        
        $this->createTable('street', [
            'id' => $this->primaryKey(),
            'area_id' => $this->integer(9)->comment('район')->notNull(),
            'street' => $this->string()->comment('улица')->notNull(),
        ]);
        
        $this->addForeignKey('street_areaid_area_id', 'street', 'area_id', 'area', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('street');
    }
}
