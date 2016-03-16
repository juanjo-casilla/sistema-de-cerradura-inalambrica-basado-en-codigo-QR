<?php
/* @var $this ReglaController */
/* @var $model Regla */

$this->breadcrumbs=array(
	'Reglas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Regla', 'url'=>array('index')),
	array('label'=>'Create Regla', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#regla-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Reglas</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'regla-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'n',
		'id_usuarios',
		'id_puertas',
		'fecha_y_hora_entrada',
		'fecha_y_hora_salida',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
