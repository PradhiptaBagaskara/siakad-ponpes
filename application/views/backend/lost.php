<?php $title = $this->db->get_where('settings' , array('type'=>'system_title'))->row()->description; ?>
<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    <title><?php echo get_phrase('recover_your_password');?> | <?php echo $title;?></title>
    
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="style/cms/favicon.png" rel="shortcut icon">
    <link href="<?php echo base_url();?>style/cms/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>style/cms/bower_components/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>style/cms/bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="<?php echo base_url();?>style/cms/bower_components/dropzone/dist/dropzone.css" rel="stylesheet">
    <link href="<?php echo base_url();?>style/cms/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>style/cms/bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>style/cms/bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>style/cms/icon_fonts_assets/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <link href="<?php echo base_url();?>style/cms/icon_fonts_assets/picons-thin/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>style/cms/css/main.css?version=3.1" rel="stylesheet">
    <script src="<?php echo base_url();?>assets/js/jquery-1.11.0.min.js"></script>
  </head>
    <body class="auth-wrapper login" style="background: url('<?php echo base_url();?>uploads/bglogin.jpg');background-size: cover;background-repeat: no-repeat;">
  <script type="text/javascript">var baseurl = '<?php echo base_url();?>';</script>
      <div class="auth-box-w">
        <div class="logo-w">
          <a href="<?php echo base_url();?>"><img alt="" src="<?php echo base_url();?>uploads/logo-color.png" width="100%"></a>
        </div>
        <h4 class="auth-header">
         <?php echo get_phrase('recover_your_password');?>
        </h4>
        <?php echo form_open(base_url() . 'login/lost_password/recovery');?>
          <div class="form-group">
            <label for=""><?php echo get_phrase('email');?></label><input class="form-control" name="field" placeholder="<?php echo get_phrase('enter_email');?>" required type="text">
            <div class="pre-icon icon-user"></div>
          </div>
          <div class="buttons-w logs row">
            <div class="col-sm-6"><button class="btn btn-rounded btn-primary" type="submit"><?php echo get_phrase('recover');?></button></div>
			<div class="col-sm-6 reg"><a class="btn btn-rounded btn-secondary"  href="<?php echo base_url();?>"><?php echo get_phrase('back');?></a></div> 
          </div><br>
        <?php echo form_close();?>
      </div>
       <script src="<?php echo base_url();?>assets/js/gsap/main-gsap.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/neon-login.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery-1.11.3.min.js"></script>
       <script src="<?php echo base_url();?>style/cms/js/toastr.js"></script>
  </body>
  <script type="text/javascript">
    $('#errorss').hide();
  </script>
  <?php if ($this->session->flashdata('flash_message') != ""):?>

<script type="text/javascript">
  toastr.success('<?php echo $this->session->flashdata("flash_message");?>');
</script>

<?php endif;?>

<?php if ($this->session->flashdata('error_message') != ""):?>

<script type="text/javascript">
  toastr.error('<?php echo $this->session->flashdata("error_message");?>');
</script>

<?php endif;?>
</html>