<?php

use yii\db\Migration;

/**
 * Class m180930_134727_create_apartments
 */
class m181003_172634_create_apartment_table extends Migration
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
        
        $this->createTable('apartment', [
            'id' => $this->primaryKey(),
            'city_id' => $this->integer(9)->comment('город')->notNull(),
            'area_id' => $this->integer(9)->comment('район')->notNull(),
            'street_id' => $this->integer(9)->comment('улица')->notNull(),
            'home' => $this->integer(5)->comment('номер дома')->notNull(),
            'apartment' => $this->integer(3)->comment('номер квартиры')->notNull(),
            'rooms' => $this->integer(2)->comment('количество комнат')->notNull(),
            'house_type_id' => $this->integer(2)->comment('тип дома')->notNull(),
            'quadrature' => $this->integer(5)->comment('квадратура')->notNull(),
            'storey' => $this->string(100)->comment('этаж/этажность')->notNull(),
            'elevator' => $this->tinyInteger(1)->comment('лифт(есть/нет)')->notNull(),
            'price' => $this->integer(11)->comment('стоимость')->notNull(),
            'stage_complete' => $this->integer(2)->comment('этап заверщенности')->notNull(),
            'payment' => $this->integer(2)->comment('форма оплаты')->notNull(),
            'rights_house' => $this->string(30)->comment('зеленка')->notNull(),
            'layout_type' => $this->integer(2)->comment('тип платнировки')->notNull(),
            'comments' => $this->text()->comment('комментарий'),
            'user_id' => $this->integer()->comment('пользователь')->notNull(),
            'date_create' => $this->datetime()->comment('дата добавления')->notNull(),
            'date_update' => $this->datetime()->comment('дата обновления')->notNull(),
            'status' => $this->integer(1)->comment('статус')->notNull(),
        ]);
        
        $this->addForeignKey('apartment_cityid_city_id', 'apartment', 'city_id', 'city', 'id');
        $this->addForeignKey('apartment_areaid_area_id', 'apartment', 'area_id', 'area', 'id');
        $this->addForeignKey('apartment_streetid_street_id', 'apartment', 'street_id', 'street', 'id');
        $this->addForeignKey('apartment_housetypeid_house_id', 'apartment', 'house_type_id', 'house_type', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('apartment');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180930_134727_create_apartments cannot be reverted.\n";

        return false;
    }
    */
}
