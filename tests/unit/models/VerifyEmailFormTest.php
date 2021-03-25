<?php

namespace app\tests\unit\models;

use app\tests\fixtures\UserFixture;
use app\modules\user\models\forms\VerifyEmailForm;
use app\modules\user\models\records\user\User;
use yii\base\InvalidArgumentException;

class VerifyEmailFormTest extends \Codeception\Test\Unit
{
    /**
     * @var \app\tests\UnitTester
     */
    protected $tester;


    public function _before()
    {
        $this->tester->haveFixtures([
            'user' => [
                'class' => UserFixture::class,
                'dataFile' => codecept_data_dir() . 'user.php'
            ]
        ]);
    }

    public function testVerifyWrongToken()
    {
        $this->tester->expectException(InvalidArgumentException::class, function() {
            new VerifyEmailForm('');
        });

        $this->tester->expectException(InvalidArgumentException::class, function() {
            new VerifyEmailForm('notexistingtoken_1391882543');
        });
    }

    public function testAlreadyActivatedToken()
    {
        $this->tester->expectException(InvalidArgumentException::class, function() {
            new VerifyEmailForm('already_used_token_1548675330');
        });
    }

    public function testVerifyCorrectToken()
    {
        $model = new VerifyEmailForm('4ch0qbfhvWwkcuWqjN8SWRq72SOw1KYT_1548675330');
        $user = $model->verifyEmail();
        expect($user)->isInstanceOf(User::class);

        expect($user->email)->equals('test@mail.com');
        expect($user->status)->equals(User::STATUS_ACTIVE);
        expect($user->validatePassword('Test1234'))->true();
    }
}
