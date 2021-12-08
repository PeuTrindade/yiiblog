<?php
/* @var $this PostController */
/* @var $model Post */

Yii::app()->name = "Conecta";

$postId = CHtml::encode($model->id);
$postTitle = CHtml::encode($model->title);
$postTags = CHtml::encode($model->tags);
$postContent = CHtml::encode($model->content);
$postimage = CHtml::encode($model->image);
$postCreateTime = CHtml::encode($model->create_time);
$postUpdateTime = CHtml::encode($model->update_time);

?>
<style>
	<?php include "./css/header/header.css"; ?>
	<?php include "./css/body_2/body_2.css"; ?>
	<?php include "./css/postPage/postPage.css"; ?>
	<?php include "./css/footer/footer.css"; ?>
</style>

<section class='container'>
	<div class='postContainer'>
		<img class='postImg' src='./uploads/<?php echo $postimage; ?>'/>
		<h2><?php echo $postTitle; ?></h2>
		<p class='postCategory'><?php echo $postTags; ?></p>
		<p class='postText'><?php echo $postContent; ?></p>
		<div class='moreInfo'>
			<p>Criado em <?php echo $postCreateTime; ?></p>
			<p>Atualizado em <?php echo $postUpdateTime; ?></p>
		</div>
		<div id='comments'>
			<?php if($model->comentCount>=1): ?>
				<h2>
					<?php echo $model->comentCount . ' comentário(s)'; ?>
				</h2>
				<?php $this->renderPartial('_coments',array(
					'post'=>$model,
					'coments'=>$model->coments,
				)); ?>
			<?php endif; ?>
			<h3>Adicione um comentário</h3>
			<?php if(Yii::app()->user->hasFlash('comentSubmitted')){ ?>
				<div class='flash-success'>
					<?php echo Yii::app()->user->getFlash('comentSubmitted'); ?>
				</div>
			<?php } else { ?>
				<?php $this->renderPartial('/coment/_form',array(
					'model'=>$coment
				)); ?>
			<?php }  ?>
		</div>
		<?php if(isset($_SESSION['logged'])){ ?>
			<a class='controls' href='index.php?r=post/update&id=<?php echo $postId; ?>'>Atualizar publicação</a>
			<a class='controls' href='index.php?r=post/deletePost&id=<?php echo $postId; ?>'>Deletar publicação</a>
		<?php } ?>
	</div>
	<div class='sideBar'>
		<form action='./index.php?r=site/index' method='POST' class='search'>
			<input name='title_search' type='text' placeholder='Busque por um título'/> <br>
			<button name='search_btn'>Pesquisar</button>
		</form>
		<h3>Tags</h3>
		<ul id='tags' class='tags'>
			<li><a class='tag' href='index.php?r=site/&tag=Empreendedorismo'>Empreendedorismo</a></li>
			<li><a class='tag' href='index.php?r=site/&tag=Tecnologia'>Tecnologia</a></li>
			<li><a class='tag' href='index.php?r=site/&tag=Trabalho'>Trabalho</a></li>
		</ul>
		<a id='deleteTags' href='index.php?r=site/index' class='deleteTagsDisabled'>Deletar</a>
	</div>
</section>