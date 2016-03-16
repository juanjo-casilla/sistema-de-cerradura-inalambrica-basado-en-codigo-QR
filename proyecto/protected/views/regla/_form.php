<?php
/* @var $this ReglaController */
/* @var $model Regla */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'regla-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_usuarios'); ?>
                <?php echo $form->dropDownList($model, 'id_usuarios', CHtml::listData(Usuarios::model()->findAll(),'id_usuarios', 'nombre'));?>
		<?php echo $form->error($model,'id_usuarios'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_puertas'); ?>
		<?php echo $form->dropDownList($model, 'id_puertas', CHtml::listData(Puertas::model()->findAll(),'id_puertas', 'nombre'));?>
		<?php echo $form->error($model,'id_puertas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_y_hora_entrada'); ?>
		<?php echo $form->textField($model,'fecha_y_hora_entrada'); ?>
		<?php echo $form->error($model,'fecha_y_hora_entrada'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_y_hora_salida'); ?>
		<?php echo $form->textField($model,'fecha_y_hora_salida'); ?>
		<?php echo $form->error($model,'fecha_y_hora_salida'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->