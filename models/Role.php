<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "role".
 *
 * @property int $id
 * @property string $name название роли
 * @property string $pages разрещенные страницы
 *
 * @property UsersRule[] $usersRules
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'role';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 120],
            [['pages'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('apartment', 'ID'),
            'name' => Yii::t('apartment', 'название роли'),
            'pages' => Yii::t('apartment', 'разрещенные страницы'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsersRules()
    {
        return $this->hasMany(UsersRule::className(), ['role_id' => 'id']);
    }
}
