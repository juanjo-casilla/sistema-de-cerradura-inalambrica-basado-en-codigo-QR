<?php
/* @var $this PuertasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Puertas',
);

$this->menu=array(
	array('label'=>'Create Puertas', 'url'=>array('create')),
	array('label'=>'Manage Puertas', 'url'=>array('admin')),
);
?>

<h1>Puertas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
