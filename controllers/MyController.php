<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\UserInfo;
use yii\helpers\Html;


class MyController extends \yii\web\Controller
{
    public function actionHello()
    {
        return $this->render('hello');
    }

    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionForm()
    {
//      $model = Yii::createObject('app\models\UserInfoForm');
        $model = new UserInfo();

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $name=Html::encode($model->name);
            $email=Html::encode($model->email);
        }
        else {
            $name='';
            $email='';
        }

        return $this->render('form', [
                'model' => $model,
                'name'=>$name,
                'email'=>$email
            ]);
    }

}