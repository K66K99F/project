<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $login
 * @property string $passwd
 * @property string $disabled
 * @property string $dual_auth_type
 * @property string $phone
 * @property string $user_type
 */
class User extends ActiveRecord implements IdentityInterface {

    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'v_users_for_auth';
    }

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($login) {
        return static::findOne(['login' => $login, 'disabled' => 'false']);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null) {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username) {
        return static::findOne(['login' => $username, 'disabled' => 'false']);
    }

    /**
     * @inheritdoc
     */
    public function getId() {
        //return $this->getPrimaryKey();
        return $this->login;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey() {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey) {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password) {

        $compare_pass=false;
        if (md5($password) === $this->passwd) {
            $compare_pass=true;
        }

        return $compare_pass;
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey() {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

}
