<?php
/* @var $this PuertasController */
/* @var $model Puertas */

$this->breadcrumbs=array(
	'Puertas'=>array('index'),
	$model->id_puertas,
);

$this->menu=array(
	array('label'=>'List Puertas', 'url'=>array('index')),
	array('label'=>'Create Puertas', 'url'=>array('create')),
	array('label'=>'Update Puertas', 'url'=>array('update', 'id'=>$model->id_puertas)),
	array('label'=>'Delete Puertas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_puertas),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Puertas', 'url'=>array('admin')),
);
?>

<h1>View Puertas #<?php echo $model->id_puertas; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_puertas',
		'nombre',
		'ubicacion',
                'clave',
	),
)); ?>
