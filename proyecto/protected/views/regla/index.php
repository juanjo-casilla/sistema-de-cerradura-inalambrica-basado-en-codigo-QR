<?php
/* @var $this ReglaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Reglas',
);

$this->menu=array(
	array('label'=>'Create Regla', 'url'=>array('create')),
	array('label'=>'Manage Regla', 'url'=>array('admin')),
);
?>

<h1>Reglas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
