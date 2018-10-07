<?php

use yii\db\Migration;

/**
 * Handles the creation of table `area`.
 */
class m181003_171119_create_area_table extends Migration
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
        
        $this->createTable('area', [
            'id' => $this->primaryKey(),
            'city_id' => $this->integer(9)->comment('город')->notNull(),
            'area' => $this->string()->comment('район')->notNull(),
        ]);
        $this->addForeignKey('area_cityid_city_id', 'area', 'city_id', 'city', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('area');
    }
}
