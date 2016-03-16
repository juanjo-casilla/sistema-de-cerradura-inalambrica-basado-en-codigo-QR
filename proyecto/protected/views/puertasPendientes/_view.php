<?php
/* @var $this PuertasPendientesController */
/* @var $data PuertasPendientes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_puertas')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_puertas), array('view', 'id'=>$data->id_puertas)); ?>
	<br />


</div>