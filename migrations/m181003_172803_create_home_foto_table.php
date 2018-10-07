<?php

use yii\db\Migration;

/**
 * Handles the creation of table `home_foto`.
 */
class m181003_172803_create_home_foto_table extends Migration
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
        
        $this->createTable('home_foto', [
            'id' => $this->primaryKey(),
            'apartment_id' => $this->integer()->comment('квартира')->notNull(),
            'foto_url' => $this->text()->comment('путь к фото')->notNull(),
        ]);
        $this->addForeignKey('homefoto_apartmentid_apartment_id', 'home_foto', 'apartment_id', 'apartment', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('home_foto');
    }
}
