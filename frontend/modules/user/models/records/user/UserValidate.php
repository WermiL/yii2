<?php

namespace frontend\modules\user\models\records\user;

use Yii;
/**
 * User Validate.
 */
class UserValidate extends UserIdentity
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'auth_key', 'password_hash'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['email', 'nickname', 'first_name', 'last_name', 'verification_token', 'password_hash', 'password_reset_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['email', 'nickname', 'password_reset_token'], 'unique'],
            ['status', 'default', 'value' => self::STATUS_INACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_DELETED]],
            [['nickname', 'first_name', 'last_name', 'verification_token', 'password_reset_token'], 'trim'],
            [['nickname', 'first_name', 'last_name', 'verification_token', 'password_reset_token'], 'filter',
                'filter' => function ($value) {
                    return ($value === '') ? null : $value;
                }],
        ];
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int)substr($token, strrpos($token, '_') + 1);
        $expire = User::PASSWORD_RESET_TOKEN_EXPIRE;
        return $timestamp + $expire >= time();
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }
}
