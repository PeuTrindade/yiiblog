<?php
/* @var $this PostController */
/* @var $model Post */

$this->breadcrumbs=array(
	'Manage Posts',
);
?>

<h1>Manage Posts</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'title',
			'type'=>'raw',
			'value'=>'CHtml::link(Chtml::encode($data->title),$data->url)'
		),
		array(
			'name'=>'create_time',
			'type'=>'date',
			'filter'=>false,
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
