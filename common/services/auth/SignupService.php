<?php

namespace common\services\auth;

use Yii;
use common\models\User;
use yii\symfonymailer\Mailer;
use frontend\models\SignupForm;

class SignupService
{

    public function signup(SignupForm $form)
    {
        $user = new User();
        $user->username = $form->username;
        $user->generateAuthKey();
        $user->setPassword($form->password);
        $user->email = $form->email;
        $user->fio = $form->fio;
        $user->phone = $form->phone;
        $user->email_confirm_token = Yii::$app->security->generateRandomString();
        //Need to customize mailer in common directory and status should be STATUS_WAIT
        //Now it signs up without verify email, just does email message
        //The email message with verify token forms at frontend/runtime
        $user->status = User::STATUS_ACTIVE;

        if (!$user->save()) {
            throw new \RuntimeException('Saving error.');
        }

        return $user;
    }

    //Send email for verify user
    public function sentEmailConfirm(User $user)
    {
        $email = $user->email;

        $sent = Yii::$app->mailer
            ->compose(
                ['html' => 'emailVerify-html.php', 'text' => 'emailVerify-text.php'],
                ['user' => $user])
            ->setTo($email)
            ->setFrom(Yii::$app->params['adminEmail'])
            ->setSubject('Confirmation of registration')
            ->send();

        if (!$sent) {
            throw new \RuntimeException('Sending error.');
        }
    }


    public function confirmation($token): void
    {
        if (empty($token)) {
            throw new \DomainException('Empty confirm token.');
        }

        $user = User::findOne(['email_confirm_token' => $token]);
        if (!$user) {
            throw new \DomainException('User is not found.');
        }

        $user->email_confirm_token = null;
        $user->status = User::STATUS_ACTIVE;
        if (!$user->save()) {
            throw new \RuntimeException('Saving error.');
        }

        if (!Yii::$app->getUser()->login($user)) {
            throw new \RuntimeException('Error authentication.');
        }
    }

}
