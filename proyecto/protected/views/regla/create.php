<?php
/* @var $this ReglaController */
/* @var $model Regla */

$this->breadcrumbs=array(
	'Reglas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Regla', 'url'=>array('index')),
	array('label'=>'Manage Regla', 'url'=>array('admin')),
);
?>

<h1>Create Regla</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>