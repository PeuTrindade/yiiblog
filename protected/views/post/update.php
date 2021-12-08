<?php
/* @var $this PostController */
/* @var $model Post */

Yii::app()->name = "Conecta";
$this->pageTitle=Yii::app()->name . ' - Editar';
?>

<style>
	<?php include './css/header/header.css'; ?>
	<?php include './css/addPost/addPost.css'; ?>
	<?php include './css/footer/footer.css'; ?>
</style>

<section class="addPostContainer">
	<h2>Edite uma publicação</h2>
    <h3>Altere as informações abaixo.</h3>
	<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	<img class='updateImg' src='./uploads/<?php echo $model->image; ?>'/>
</section>

<script src='./js/imageConfig.js'></script>