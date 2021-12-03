<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

Yii::app()->name = "Conecta";
$this->pageTitle=Yii::app()->name . ' - Login';
?>

<style>
	<?php include './css/login/login.css'; ?>
</style>

<section class='content'>
	<div class='loginContainer'>
		<h1>Faça seu login</h1>
		<p>Preencha os campos abaixo com suas informações</p>
		<div class="form">
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'login-form',
				'enableClientValidation'=>true,
				'clientOptions'=>array(
					'validateOnSubmit'=>true,
				),
			)); ?>
			<div class="row">
				<?php echo $form->labelEx($model,'Usuario'); ?>
				<?php echo $form->textField($model,'username'); ?>
				<?php echo $form->error($model,'username'); ?>
			</div>
			<div class="row">
				<?php echo $form->labelEx($model,'Senha'); ?>
				<?php echo $form->passwordField($model,'password'); ?>
				<?php echo $form->error($model,'password'); ?>
			</div>
			<div class="row buttons">
				<?php echo CHtml::submitButton('Entrar'); ?>
			</div>
			<?php $this->endWidget(); ?>
		</div>
	</div>
	<img class='image' src='./images/coworking2.jpg'/>
</section>
