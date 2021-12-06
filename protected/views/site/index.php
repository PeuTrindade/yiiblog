<?php
/* @var $this SiteController */

Yii::app()->name = "Conecta";
$this->pageTitle=Yii::app()->name;
session_start();
?>

<style>
	<?php include './css/body_1/body_1.css';  ?>
	<?php include './css/body_2/body_2.css';  ?>
	<?php include './css/body_3/body_3.css';  ?>
</style>

<section class="allContent">
	<section class='welcomeSection'>
		<div class='textContainer'>
			<h1>Olá, somos o Conecta</h1>
			<h3>Seu blog de notícias sobre Coworking e afins!</h3>
			<p>Ao contrário do que se acredita, Lorem Ipsum não é simplesmente um texto randômico. Com mais de 2000 anos, suas raízes podem ser encontradas em uma obra de literatura latina clássica datada de 45 AC. Richard McClintock, um professor de latim do Hampden-Sydney College na Virginia, pesquisou uma das mais obscuras palavras em latim, consectetur, oriunda de uma passagem de Lorem Ipsum, e, procurando por entre citações da palavra na literatura clássica, descobriu a sua indubitável origem. Lorem Ipsum vem das seções 1.10.32 e 1.10.33 do 'de Finibus Bonorum et Malorum' (Os Extremos do Bem e do Mal), de Cícero, escrito em 45 AC. Este livro é um tratado de teoria da ética muito popular na época da Renascença. A primeira linha de Lorem Ipsum, 'Lorem Ipsum dolor sit amet...' vem de uma linha na seção 1.10.32.</p>
		</div>
		<img src='./images/coworking1.jpg' alt='coworking'/>
	</section>
	<section class='postsContainer'>
	<h2>Confira nossos posts</h2>
        <h3>Fique por dentro das novidades</h3>
        <img class="arrow" src="./images/arrow.svg" alt="arrow"/>
        <div class="content">
        <div class="posts">
			<?php
				$this->widget('zii.widgets.CListView', array(
					'dataProvider'=>$dataProvider,
					'itemView'=>'posts',
					'template'=>"{items}\n{pager}",
					'pager'=> array(
						'header'=>'',
						'prevPageLabel' => 'Anterior',
        				'nextPageLabel' => 'Próximo',
					)
				));
			?>
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
	<section id='sobre' class='aboutContainer'>
        <div class='aboutText'>
            <h1>Conheça um pouco mais sobre o Conecta</h1>
            <h3>Nossa história e nossa missão</h3>
            <p>Ao contrário do que se acredita, Lorem Ipsum não é simplesmente um texto randômico. Com mais de 2000 anos, suas raízes podem ser encontradas em uma obra de literatura latina clássica datada de 45 AC. Richard McClintock, um professor de latim do Hampden-Sydney College na Virginia, pesquisou uma das mais obscuras palavras em latim, consectetur, oriunda de uma passagem de Lorem Ipsum, e, procurando por entre citações da palavra na literatura clássica, descobriu a sua indubitável origem. Lorem Ipsum vem das seções 1.10.32 e 1.10.33 do 'de Finibus Bonorum et Malorum' (Os Extremos do Bem e do Mal), de Cícero, escrito em 45 AC. Este livro é um tratado de teoria da ética muito popular na época da Renascença. A primeira linha de Lorem Ipsum, 'Lorem Ipsum dolor sit amet...' vem de uma linha na seção 1.10.32.</p>
        </div>
        <img src='./images/coworking3.jpg' alt='coworking'/>
    </section>
	<?php if(isset($_SESSION['logged'])){ ?>
	<section class="addButton">
        <a href="./index.php?r=post/create">Quero Publicar</a>
    </section>
	<?php } ?>
</section>
<script src='./js/tagsConfig.js'></script>