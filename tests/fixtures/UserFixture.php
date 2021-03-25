<?php
namespace app\tests\fixtures;


use app\modules\user\models\records\user\User;
use yii\test\ActiveFixture;


class UserFixture extends ActiveFixture
{
    public $modelClass = User::class;
}