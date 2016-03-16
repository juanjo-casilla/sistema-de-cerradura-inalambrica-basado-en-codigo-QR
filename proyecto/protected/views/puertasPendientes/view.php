<?php
/* @var $this PuertasPendientesController */
/* @var $model PuertasPendientes */

$this->breadcrumbs=array(
	'Puertas Pendientes'=>array('index'),
	$model->id_puertas,
);

$this->menu=array(
	array('label'=>'List Puertas Pendientes', 'url'=>array('index')),
	array('label'=>'Create Puertas Pendientes', 'url'=>array('create')),
	array('label'=>'Update Puertas Pendientes', 'url'=>array('update', 'id'=>$model->id_puertas)),
	array('label'=>'Delete Puertas Pendientes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_puertas),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Puertas Pendientes', 'url'=>array('admin')),
);
?>

<h1>View PuertasPendientes #<?php echo $model->id_puertas; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_puertas',
	),
)); ?>
