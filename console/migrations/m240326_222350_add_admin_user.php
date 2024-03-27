<?php

use yii\db\Migration;

/**
 * Class m240326_222350_add_admin_user
 */
class m240326_222350_add_admin_user extends Migration
{
    const TABLE_NAME = 'user';

    public function up()
    {
        $this->insert(self::TABLE_NAME, [
            'isAdmin' => 1,
            'fio' => 'Ivanov Ivan Ivanovich',
            'phone' => 893333333,
            'status' => 10,
            'username' => 'admin',
            'email' => 'admin@yoursite.ru',
            'created_at' => time(),
            'updated_at' => time(),
            'auth_key' => Yii::$app->security->generateRandomString(),
            'password_hash' => Yii::$app->security->generatePasswordHash('admin1234')
        ]);
    }

    public function down()
    {
        $this->delete(self::TABLE_NAME, ['username' => 'admin']);
    }
}
