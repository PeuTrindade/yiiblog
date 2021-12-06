<?php /* @var $this Controller */?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">
	<link rel='stylesheet' href='./css/header/header.css'></link>
	<link rel='stylesheet' href='./css/footer/footer.css'></link>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
	<header class='header'>
		<nav class='navbarDesktop'>	
				<div class='brand'>
						<img src='./images/logo.svg' alt='logo'/>
						<h3><?php echo CHtml::encode(Yii::app()->name); ?></h3>
				</div>
				<?php $this->widget('zii.widgets.CMenu',array(
					'items'=>array(
						array('label'=>'Home', 'url'=>array('/site/index')),
						array('label'=>'Sobre nós', 'url'=>array('/site/#sobre')),
						array('label'=>'Contato', 'url'=>array('/site/#contato')),
						array('label'=>'Login', 'url'=>array('/site/login'),'visible'=>!isset($_SESSION['logged'])),
						array('label'=>'Logout', 'url'=>array('/site/logout'), 'visible'=> isset($_SESSION['logged']))
					),
				)); ?>
				<img onClick='openMobileDisplay()' class='menuMobileDisabled' src='./images/menumobile.svg'/>
            	<img onClick='closeMobileDisplay()' class='menuMobileCloseDisabled' src='./images/closeMenu.svg'/>
		</nav>
		<div class='mobileDisplayDisabled'>
        <img onClick='closeMobileDisplay()' class='menuMobileClose2Disabled' src='$this->closeIcon'/>
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
			array('label'=>'Home', 'url'=>array('/site/index')),
			array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
			array('label'=>'Contact', 'url'=>array('/site/contact')),
			array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
			array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
        </div>
	</header>
	<?php echo $content; ?>
	<footer id='contato' class='footerContainer'>
		<div class='firstInfo'>
			<div class='local'>
				<h3>Localização</h3>
				<p>Feira de Santana,BA</p>
				<p>Rua Exemplo, 15</p>
			</div>
			<div class='contato'>
				<h3>Contato</h3>
				<p>(75)99999-9999</p>
				<p>3333-3333</p>
			</div>
		</div>
        <div class='secondInfo'>
            <div class='socialMedia'>
                <h3>Redes sociais</h3>
                <div class='insta'><img src='./images/insta.png'/> <span>@conecta</span></div>
                <div class='face'><img src='./images/face.png'/> <span>conecta_blog</span></div>
            </div>
            <div class='rights'>
                <p>@Todos direitos reservados</p>
            </div>
        </div>
	</footer>

	<script src='./js/navbar.js'></script>
</body>
</html>
