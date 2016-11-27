<?php
use yii\widgets\ActiveForm;
use yii\helpers;
?>

<?php $f=ActiveForm::begin();?>

<?=$f->field($model,'name')?>
<?=$f->field($model,'email')?>

<?=helpers\Html::submitButton('Send');?>

<?php ActiveForm::end();?>