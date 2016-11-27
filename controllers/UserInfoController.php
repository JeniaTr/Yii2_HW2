<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\UserInfoForm;


class UserController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionUserInfoForm()
    {
        $model = new UserInfoForm();
//      $model = Yii::createObject('app\models\UserInfoForm');
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        }
        return $this->render('form', [
            'model' => $model
        ]);


    }
}