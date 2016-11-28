<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class UserInfo extends Model
{

    public $name;
    public $email;
    public $password;
    public $passwordR;
    public $yearOfWeding;
    public $verificationCode;
    public $dateOfBirth;
    public $avatarImage;
    public $accept;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['name', 'email', 'password', 'yearbirth','verificationCode'], 'required', 'message'=>'Не заполнено'],
            ['name', 'string', 'max' => 35, 'message'=>'нельзя больше 35 символов'],
            ['dateOfBirth','date', 'format' => 'd-m-Y'],
            ['email' , 'email', 'message'=>'Не коректный имейл адрес'],
            [['password', 'passwordR'], 'string', 'min' => 6, 'max' => 35, 'message'=>'нельзя больше 20 символов'],
            ['passwordR', 'compare', 'compareAttribute' => 'password','message'=>'Пароли разные'],
            ['yearOfWeding', 'string', 'length' => 4, 'message'=>'Не больше 4 символов'],
            ['yearOfWeding', 'number','min' =>1950, 'max'=>date('Y'),'message'=>'Год выходит за приделы допустимого с 1950 до сегодня' ],


            ['verificationCode', 'captcha','message'=>'Код не верен'],
//            ['dateOfBirth', 'string'],
            [['avatarImage'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxSize' => 8024*8024],

            ['accept', 'required', 'requiredValue' => 1, 'message' => 'Если ві не примите условия, не сможите заригистрироватся'],


        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->avatarImage->saveAs('uploads/' . $this->avatarImage->baseName . '.' . $this->avatarImage->extension);
            return true;
        } else {
            return false;
        }
    }
}
