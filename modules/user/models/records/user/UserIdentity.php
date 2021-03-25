<?php

namespace app\modules\user\models\records\user;

use yii\base\NotSupportedException;
use yii\web\IdentityInterface;

/**
 * This is the model User Identity.
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
class UserIdentity extends UserQuery implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('NotSupported');
    }


    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
}
