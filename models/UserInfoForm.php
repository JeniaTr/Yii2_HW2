<?php
/**
 * Created by PhpStorm.
 * User: jeniatr
 * Date: 26.11.16
 * Time: 23:32
 */

namespace app\models;

use Yii;
use yii\base\Model;

class UserInfoForm extends Model
{
    public $username;
    public $password;

    public function rules()
    {
        return [
            [['name', 'email'], 'required', 'message'=>'Не заполнено'],
            ['email', 'email', 'message'=>'Не коректный имейл адрес']
        ];
    }

}