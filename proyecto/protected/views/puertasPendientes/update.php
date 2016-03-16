<?php
/* @var $this PuertasPendientesController */
/* @var $model PuertasPendientes */

$this->breadcrumbs=array(
	'Puertas Pendientes'=>array('index'),
	$model->id_puertas=>array('view','id'=>$model->id_puertas),
	'Update',
);

$this->menu=array(
	array('label'=>'List Puertas Pendientes', 'url'=>array('index')),
	array('label'=>'Create Puertas Pendientes', 'url'=>array('create')),
	array('label'=>'View Puertas Pendientes', 'url'=>array('view', 'id'=>$model->id_puertas)),
	array('label'=>'Manage Puertas Pendientes', 'url'=>array('admin')),
);
?>

<h1>Update Puertas Pendientes <?php echo $model->id_puertas; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>