<?php

namespace frontend\modules\user\models\records\user;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $email
 * @property string $nickname
 * @property string $first_name
 * @property string $last_name
 * @property string $auth_key
 * @property string|null $verification_token
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class UserInit extends \yii\db\ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;
    const PASSWORD_RESET_TOKEN_EXPIRE = 3600;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('user', 'ID'),
            'email' => Yii::t('user', 'Email'),
            'nickname' => Yii::t('user', 'Nickname'),
            'first_name' => Yii::t('user', 'First Name'),
            'last_name' => Yii::t('user', 'Last Name'),
            'auth_key' => Yii::t('user', 'Auth Key'),
            'verification_token' => Yii::t('user', 'Verification Token'),
            'password_hash' => Yii::t('user', 'Password Hash'),
            'password_reset_token' => Yii::t('user', 'Password Reset Token'),
            'status' => Yii::t('user', 'Status'),
            'created_at' => Yii::t('user', 'Created At'),
            'updated_at' => Yii::t('user', 'Updated At'),
        ];
    }
}
