<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo $title_for_layout; ?> - <?php __('Installasi MIBS'); ?></title>
    <?php
        echo $html->css('install');
		echo  $javascript->link('jquery-1.10.1.min');		
		echo  $javascript->link(array('prototype','scriptaculous'));
		echo  $javascript->link('highlight');
        echo $scripts_for_layout;
    ?>
</head>

<body>
	<div id="topright">
		<img src="<?php echo $this->webroot;?>art/install/ponan.png">
	</div>
	<div id="bottomleft">
		<img src="<?php echo $this->webroot;?>art/install/ponri.png">
	</div>
	<div id="wrap">
		<?php $session->flash(); ?>
		<img src="<?php echo $this->webroot;?>art/install/illustrator1.png" id="main">
		
		<div id="content">
			<div class="header">
			<h2 class="">Selamat Datang di INSTALASI Applikasi <br/><?php echo $appLicationName;?></h2>
			
			</div>
			<div class="menu" id="install">
				
				<?php echo $content_for_layout; ?>
	            
			</div>
			<p class="footer <?php if ($footerSpecial == true){echo 'special';} ?>">
				<small> 
						&#169; Copyright 2015 | Powered by IDE HASAMA INDONESIA .PT
						<br/>
						Semua hak cipta dilindungi oleh undang - undang dan terdaftar atas HASAMA
						</br/>
				</small>
			</p>
		</div>
    </div>
    
</body>
</html>