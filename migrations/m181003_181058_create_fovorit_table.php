<?php

use yii\db\Migration;

/**
 * Handles the creation of table `fovorit`.
 */
class m181003_181058_create_fovorit_table extends Migration
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
        
        $this->createTable('favorit', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->comment('пользователь')->notNull(),
            'apartment_id' => $this->integer()->comment('квартира')->notNull(),
        ]);
        $this->addForeignKey('favorit_userid_user_id', 'favorit', 'user_id', 'user', 'id');
        $this->addForeignKey('favorit_apartmentid_apartment_id', 'favorit', 'apartment_id', 'apartment', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('fovorit');
    }
}
