<?php
/* @var $this PuertasController */
/* @var $data Puertas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_puertas')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_puertas), array('view', 'id'=>$data->id_puertas)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ubicacion')); ?>:</b>
	<?php echo CHtml::encode($data->ubicacion); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('clave')); ?>:</b>
	<?php echo CHtml::encode($data->clave); ?>
	<br />


</div>