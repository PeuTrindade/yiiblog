<?php
/* @var $this ComentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Coments',
);

$this->menu=array(
	array('label'=>'Create Coment', 'url'=>array('create')),
	array('label'=>'Manage Coment', 'url'=>array('admin')),
);
?>

<h1>Coments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
