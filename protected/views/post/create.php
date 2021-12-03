<?php
/* @var $this PostController */
/* @var $model Post */

Yii::app()->name = "Conecta";
$this->pageTitle=Yii::app()->name . ' - Criar';
?>

<style>
	<?php include './css/addPost/addPost.css'; ?>
</style>

<section class="addPostContainer">
	<h2>Publique um artigo na nossa página!</h2>
    <h3>Compartilhe informações relevantes para a comunidade.</h3>
	<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</section>

<script src='./js/imageConfig.js'></script>