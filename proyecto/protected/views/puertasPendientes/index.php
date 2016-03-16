<?php
/* @var $this PuertasPendientesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Puertas Pendientes',
);

$this->menu=array(
	array('label'=>'Create Puertas Pendientes', 'url'=>array('create')),
	array('label'=>'Manage Puertas Pendientes', 'url'=>array('admin')),
);
?>

<h1>Puertas Pendientes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
