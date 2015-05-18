<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/cis.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?>
                    <div style="float: right; font-size: 14px;">Welcome 
                    <?php if(isset(Yii::app()->user->id) and Yii::app()->user->id !=''){ 
                        $userdata = Yii::App()->user->User;
                        echo $userdata['firstname'].' '.$userdata['lastname'];;
                        echo ' | ';
                        echo CHtml::link('Logout',Yii::app()->request->baseUrl.'/index.php/users/logout',array());
                    }?></div>
                </div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php 
                //echo Yii::app()->user->id;
                if(isset(Yii::app()->user->id) and Yii::app()->user->id !=''){
                /*$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('users/dashboard')),
				array('label'=>'About', 'url'=>array('site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('site/contact')),
				array('label'=>'Login', 'url'=>array('site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); } */?>
            <div id="mainmenu">
		<ul id="yw0">
                    <li class=""><?php echo CHtml::link('Dashboard',Yii::app()->request->baseUrl.'/index.php/users/dashboard')?></li>
                    <li><?php echo CHtml::link('Groups',Yii::app()->request->baseUrl.'/index.php/users/showgroup')?></li>
                    <li><?php echo CHtml::link('Manage Contacts',Yii::app()->request->baseUrl.'/index.php/contacts/admin')?></li>
                </ul>
            </div>
            <?php }?>
	</div><!-- mainmenu -->

	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'links'=>$this->breadcrumbs,
	)); ?><!-- breadcrumbs -->

	<?php echo $content; ?>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>