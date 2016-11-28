<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\UserInfo;
use yii\helpers\Html;
use yii\web\UploadedFile;


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


    /**
     * @return string
     */
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

        if (Yii::$app->request->isPost) {
            $model->avatarImage = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
        }

        return $this->render('form', [
                'model' => $model,
                'name'=>$name,
                'email'=>$email
            ]);
    }

}