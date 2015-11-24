<div class="install">
	
	
    <h2><?php echo $this->pageTitle; ?></h2>

    <p>
		Aplikasi ini dipersembahkan oleh:
        </p>
<br/>
<div class="blue_box">
    <img src="<?php echo $this->webroot; ?>art/install/hasama_logo.png"> 
</div>


    

    <?php
        echo $html->link(__('Klik disini untuk memulai Applikasi', true), array(
            'plugin' => 'install',
            'controller' => 'install',
            'action' => 'deleteInstallFolder',
            'delete' => 1,
        ),array('class'=>'button'));
    ?>
	<br/>
</div>