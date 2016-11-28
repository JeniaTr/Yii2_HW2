<?php

use yii\widgets\ActiveForm;
use yii\helpers;
use yii\helpers\Html;
use yii\captcha\Captcha;


?>

    <?php if ($name) {?><p> Вы ввили имя <b><?=$name?></b> и имейл <b> <?=$email?> </b>. </p> <?php } ?>

    <?php $f=ActiveForm::begin();?>

        <?=$f->field($model,'name')?>
        <?=$f->field($model,'email')?>
        <?=$f->field($model,'password')->passwordInput()?>
        <?=$f->field($model,'passwordR')->passwordInput()?>
        <?=$f->field($model,'dateOfBirth')->input('date')?>
        <?=$f->field($model,'yearOfWeding')?>

        <?= $f->field($model, 'verificationCode')->widget(Captcha::className(), [
            'template' => '{image} {input}',
        ]) ?>
        <?=$f->field($model,'avatarImage')->fileInput()?>

        <?= $f->field($model, 'accept')->checkbox([
            'label' => 'Согласны ли вы с правилами',
            'labelOptions' => [
                'style' => 'padding-left:20px;'
            ],
            //'disabled' => true
        ])
        ;?>


        <?=helpers\Html::submitButton('Send');?>

    <?php ActiveForm::end();?>
