<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $form CActiveForm */
?>

<div class="form">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'post-form',
			'htmlOptions'=>array(
				'enctype'=>'multipart/form-data'
			),
			'enableAjaxValidation'=>false,
		)); ?>
		<?php echo $form->errorSummary($model); ?>
		<div class="row">
			<?php echo $form->labelEx($model,'title'); ?>
			<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'title'); ?>
		</div>
		<div id="imageRow" class="row">
			<input id='imageInfo' value='<?php echo $model->image; ?>' type='hidden'/>
			<?php echo $form->labelEx($model,'image'); ?>
			<?php echo $form->fileField($model,'image'); ?>
			<?php echo $form->error($model,'image'); ?>
		</div>
		<div class="row">
			<?php echo $form->labelEx($model,'content'); ?>
			<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'content'); ?>
		</div>
		<div class="row">
			<?php echo $form->labelEx($model,'tags'); ?>
			<?php echo $form->textField($model,'tags',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'tags'); ?>
		</div>
		<div class="row buttons">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Publicar' : 'Salvar'); ?>
		</div>
	<?php $this->endWidget(); ?>
</div>