<?php

namespace tests\functional;

use tests\FunctionalTester;
use frontend\modules\user\models\records\user\User;

class SignupCest
{
    protected $formId = '#sign-up-form';


    public function _before(FunctionalTester $I)
    {
        \Yii::$app->authManager->removeAllAssignments();
        $I->amOnRoute('user/sign-up');
    }

    public function signupWithEmptyFields(FunctionalTester $I)
    {
        $I->see('Please fill out the following fields to sign up:');
        $I->submitForm($this->formId, []);
        $I->seeValidationError('Email cannot be blank.');
        $I->seeValidationError('Password cannot be blank.');

    }

    public function signupWithWrongEmail(FunctionalTester $I)
    {
        $I->submitForm(
            $this->formId, [
            'SignUpForm[email]'     => 'tttt',
            'SignUpForm[password]'  => 'tester_password',
        ]
        );
        $I->dontSee('Email cannot be blank.', '.invalid-feedback');
        $I->dontSee('Password cannot be blank.', '.invalid-feedback');
        $I->see('Email is not a valid email address.', '.invalid-feedback');
    }

    public function signupSuccessfully(FunctionalTester $I)
    {
        $I->submitForm($this->formId, [
            'SignUpForm[email]' => 'testers.email@example.com',
            'SignUpForm[password]' => 'tester_password',
        ]);

        $I->seeRecord(User::class, [
            'email' => 'testers.email@example.com',
            'status' => User::STATUS_INACTIVE
        ]);

        $I->seeEmailIsSent();
        $I->see('Thank you for registration. Please check your inbox for verification email.');
    }
    public function signupFinishTest(FunctionalTester $I)
    {
        \Yii::$app->authManager->removeAllAssignments();
    }
}
