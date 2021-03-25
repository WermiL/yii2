<?php

namespace app\tests\functional;

use app\tests\FunctionalTester;
use app\tests\fixtures\UserFixture;

class LoginCest
{
    /**
     * Load fixtures before db transaction begin
     * Called in _before()
     * @see \Codeception\Module\Yii2::_before()
     * @see \Codeception\Module\Yii2::loadFixtures()
     * @return array
     */
    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'login_data.php',
            ],
        ];
    }

    public function _before(FunctionalTester $I)
    {
        $I->amOnRoute('user/sign-in');
    }

    protected function formParams($login, $password)
    {
        return [
            'SignInForm[email]' => $login,
            'SignInForm[password]' => $password,
        ];
    }

    public function checkEmpty(FunctionalTester $I)
    {
        $I->submitForm('#sign-in-form', $this->formParams('', ''));
        $I->seeValidationError('Email cannot be blank.');
        $I->seeValidationError('Password cannot be blank.');
    }

    public function checkWrongPassword(FunctionalTester $I)
    {
        $I->submitForm('#sign-in-form', $this->formParams('admin', 'wrong'));
        $I->seeValidationError('Incorrect email or password.');
    }

    public function checkInactiveAccount(FunctionalTester $I)
    {
        $I->submitForm('#sign-in-form', $this->formParams('test@mail.com', 'Test1234'));
        $I->seeValidationError('Incorrect email or password');
    }

    public function checkValidLogin(FunctionalTester $I)
    {
        $I->submitForm('#sign-in-form', $this->formParams('sfriesen@jenkins.info', 'password_0'));
        $I->see('Sign out (sfriesen@jenkins.info)', 'form button[type=submit]');
        $I->dontSeeLink('Sign in');
        $I->dontSeeLink('Sign up');
    }
}
