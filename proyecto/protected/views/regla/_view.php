<?php
/* @var $this ReglaController */
/* @var $data Regla */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('n')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->n), array('view', 'id'=>$data->n)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuarios')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuarios); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_puertas')); ?>:</b>
	<?php echo CHtml::encode($data->id_puertas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_y_hora_entrada')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_y_hora_entrada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_y_hora_salida')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_y_hora_salida); ?>
	<br />


</div>