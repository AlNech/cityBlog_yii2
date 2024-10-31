<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $verifyCode;
    public $username;
    public $email;
    public $password;
    public $password_repeat;
    public $fio;
    public $phone;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['fio', 'string', 'min' => 2, 'max' => 255],
            ['phone', 'string', 'min' => 2, 'max' => 255],

            ['status', 'default', 'value' => User::STATUS_INACTIVE],

            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
            ['password_repeat', 'required'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => "Passwords don't match"],
            ['verifyCode', 'captcha'],
        ];
    }

     /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return false;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->generateAuthKey();
        $user->setPassword($this->password);
        $user->email = $this->email;
        $user->fio = $this->fio;
        $user->phone = $this->phone;
        $user->email_confirm_token = Yii::$app->security->generateRandomString() . '_' . time();

        return $user->save() && $this->sendEmail($user);
    }

    
     /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
