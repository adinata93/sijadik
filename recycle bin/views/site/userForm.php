<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php
	if(Yii::$app->session->hasFlash('success'))
	{
		echo "<div class='alert alert-success'>".Yii::$app->session->getFlash('success')."</div>";
	}
?>

<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model9,'name'); ?>
<?= $form->field($model9,'email'); ?>


<?= Html::submitButton('Submit',['class'=>'btn btn-success']); ?>
<?php $form = ActiveForm::end(); ?>
