<?php
/* @var $this ReglaController */
/* @var $model Regla */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'n'); ?>
		<?php echo $form->textField($model,'n'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_usuarios'); ?>
		<?php echo $form->textField($model,'id_usuarios'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_puertas'); ?>
		<?php echo $form->textField($model,'id_puertas'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_y_hora_entrada'); ?>
		<?php echo $form->textField($model,'fecha_y_hora_entrada'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_y_hora_salida'); ?>
		<?php echo $form->textField($model,'fecha_y_hora_salida'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->