<?php
/* @var $this ComentController */
/* @var $model Coment */

$this->breadcrumbs=array(
	'Coments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Coment', 'url'=>array('index')),
	array('label'=>'Manage Coment', 'url'=>array('admin')),
);
?>

<h1>Create Coment</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>