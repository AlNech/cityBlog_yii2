<?php

use yii\db\Migration;

/**
 * Class m230419_144339_add_user_email_confirm_token
 */
class m230419_144339_add_user_email_confirm_token extends Migration
{
    public function up()
    {
        $this->addColumn('{{%user}}', 'email_confirm_token', $this->string()->unique()->after('email'));
    }

    public function down()
    {
        $this->dropColumn('{{%user}}', 'email_confirm_token');
    }
}
