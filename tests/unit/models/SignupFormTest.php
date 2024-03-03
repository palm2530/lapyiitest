<?php

namespace tests\unit\models;

use app\models\SignupForm;
use app\models\User;


class SignupFormTest extends \Codeception\Test\Unit
{

    function testRules()
    {
        $model = new SignupForm();

        $model->username = 'div1';
        $model->email = 'dev@maill.com';
        $model->password = '1234566';
        $this->assertTrue($model->validate());

        // $model->username = "chang";
        // $this->assertTrue($model->validate());

        // $model->username = " div01 ";
        // $model->validate();
        // $this->assertEquals("div01", $model->username);
    }

    public function testSignup()
    {
        $model = new SignupForm();

        $model->username = 'div01';
        $model->email = 'dev@maill.com';
        $model->password = '1234566';

        $user = $model->signup();
        $this->assertNotEmpty($user->username);

        $user = User::findByUsername($user->username);
        $this->assertNotEmpty($user->username);

        //fail
        $model->username = "";
        $user = $model->signup();
        $this->assertNull($user);
    }
}
