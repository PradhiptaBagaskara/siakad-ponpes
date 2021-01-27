<?php
	$system_name        =	$this->db->get_where('settings' , array('type'=>'system_name'))->row()->description;
	$system_title       =	$this->db->get_where('settings' , array('type'=>'system_title'))->row()->description;
	$skin           =	$this->db->get_where('settings' , array('type'=>'skin'))->row()->description;
    $account_type       =	$this->session->userdata('login_type');
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?php echo $page_title;?> | <?php echo $system_title;?></title>
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="template language" name="keywords">
    <meta content="GuateApps" name="author">
    <meta content="EduAppGT PRO - School Management System" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="<?php echo base_url();?>uploads/favicon.png" rel="shortcut icon">
    <?php if($skin == 'main'):?>
       <link href="<?php echo base_url();?>style/cms/css/main.css" media="all" rel="stylesheet">
    <?php endif;?>
    <?php if($skin != 'main'):?>
       <link href="<?php echo base_url();?>style/cms/css/themes/<?php echo $skin;?>.css" rel="stylesheet">
    <?php endif;?>
    <?php include 'topcss.php';?>	
</head>
<body>
	<div class="all-wrapper menu-side with-side-panel">
    	<div class="layout-w">
			<?php include $account_type.'/navigation.php';?>	
			<?php include $account_type.'/'.$page_name.'.php';?>
    	</div>
    	<div class="display-type"></div>
    </div>
        <?php include 'modal.php';?>
    <?php include 'scripts.php';?>  
</body>
</html>