<?php
/* @var $this PuertasPendientesController */
/* @var $model PuertasPendientes */

$this->breadcrumbs=array(
	'Puertas Pendientes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Puertas Pendientes', 'url'=>array('index')),
	array('label'=>'Manage Puertas Pendientes', 'url'=>array('admin')),
);
?>

<h1>Create PuertasPendientes</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>