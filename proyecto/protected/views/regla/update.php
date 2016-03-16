<?php
/* @var $this ReglaController */
/* @var $model Regla */

$this->breadcrumbs=array(
	'Reglas'=>array('index'),
	$model->n=>array('view','id'=>$model->n),
	'Update',
);

$this->menu=array(
	array('label'=>'List Regla', 'url'=>array('index')),
	array('label'=>'Create Regla', 'url'=>array('create')),
	array('label'=>'View Regla', 'url'=>array('view', 'id'=>$model->n)),
	array('label'=>'Manage Regla', 'url'=>array('admin')),
);
?>

<h1>Update Regla <?php echo $model->n; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>