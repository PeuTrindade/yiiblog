<?php
/* @var $this ComentController */
/* @var $model Coment */

$this->breadcrumbs=array(
	'Coments'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Coment', 'url'=>array('index')),
	array('label'=>'Create Coment', 'url'=>array('create')),
	array('label'=>'View Coment', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Coment', 'url'=>array('admin')),
);
?>

<h1>Update Coment <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>