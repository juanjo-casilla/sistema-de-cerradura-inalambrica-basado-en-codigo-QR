<?php
/* @var $this ReglaController */
/* @var $model Regla */

$this->breadcrumbs=array(
	'Reglas'=>array('index'),
	$model->n,
);

$this->menu=array(
	array('label'=>'List Regla', 'url'=>array('index')),
	array('label'=>'Create Regla', 'url'=>array('create')),
	array('label'=>'Update Regla', 'url'=>array('update', 'id'=>$model->n)),
	array('label'=>'Delete Regla', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->n),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Regla', 'url'=>array('admin')),
);
?>

<h1>View Regla #<?php echo $model->n; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'n',
		'id_usuarios',
		'id_puertas',
		'fecha_y_hora_entrada',
		'fecha_y_hora_salida',
	),
)); ?>
