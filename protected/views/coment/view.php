<?php
/* @var $this ComentController */
/* @var $model Coment */

$this->breadcrumbs=array(
	'Coments'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Coment', 'url'=>array('index')),
	array('label'=>'Create Coment', 'url'=>array('create')),
	array('label'=>'Update Coment', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Coment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Coment', 'url'=>array('admin')),
);
?>

<h1>View Coment #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'content',
		'status',
		'create_time',
		'author',
		'email',
		'url',
		'post_id',
	),
)); ?>
