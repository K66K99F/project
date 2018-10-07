<?php

use yii\db\Migration;

/**
 * Handles the creation of table `page`.
 */
class m181003_175848_create_page_table extends Migration
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
        
        $this->createTable('page', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->comment('название страницы')->notNull(),
            'url' => $this->text()->comment('url страницы')->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('page');
    }
}
