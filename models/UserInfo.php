<?php

namespace app\models;

use Yii;
use yii\base\Model;

class UserInfo extends Model
{

    public $name;
    public $email;

    public function rules()
    {
        return [
            [['name', 'email'], 'required', 'message'=>'Не заполнено'],
            ['email', 'email', 'message'=>'Не коректный имейл адрес']
        ];
    }

}
?>