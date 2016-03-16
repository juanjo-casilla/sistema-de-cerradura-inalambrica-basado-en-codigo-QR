<?php
/* @var $this PuertasController */
/* @var $model Puertas */

$this->breadcrumbs=array(
	'Puertas'=>array('index'),
	$model->id_puertas=>array('view','id'=>$model->id_puertas),
	'Update',
);

$this->menu=array(
	array('label'=>'List Puertas', 'url'=>array('index')),
	array('label'=>'Create Puertas', 'url'=>array('create')),
	array('label'=>'View Puertas', 'url'=>array('view', 'id'=>$model->id_puertas)),
	array('label'=>'Manage Puertas', 'url'=>array('admin')),
);
?>

<h1>Update Puertas <?php echo $model->id_puertas; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>