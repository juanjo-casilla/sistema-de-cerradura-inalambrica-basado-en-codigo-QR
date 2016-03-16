<?php
/* @var $this PuertasController */
/* @var $model Puertas */

$this->breadcrumbs=array(
	'Puertas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Puertas', 'url'=>array('index')),
	array('label'=>'Manage Puertas', 'url'=>array('admin')),
);
?>

<h1>Create Puertas</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>