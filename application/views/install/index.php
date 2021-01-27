<!DOCTYPE html>
<html>
  <head>
    <title>Welcome to the installation wizard | EduAppGT</title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="style/cms/favicon.png" rel="shortcut icon">
    <link href="style/cms/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet" type="text/css">
    <link href="style/cms/bower_components/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="style/cms/bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="style/cms/bower_components/dropzone/dist/dropzone.css" rel="stylesheet">
    <link href="style/cms/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="style/cms/bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="style/cms/bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet">
  <link href="style/cms/icon_fonts_assets/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <link href="style/cms/icon_fonts_assets/picons-thin/style.css" rel="stylesheet">
    <link href="style/cms/css/main.css?version=3.3" rel="stylesheet">
  </head>
  <body class="auth-wrapper login" style="background: url('uploads/bglogin.jpg');background-size: cover;background-repeat: no-repeat;">
      <div class="auth-box-w wider">
        <div class="logo-wy">
          <a href="<?php echo base_url();?>"><img alt="" src="uploads/logo-color.png" width="35%"></a>
        </div>
          <?php echo form_open(base_url() . 'index.php?install/setup' , array('enctype' => 'multipart/form-data'));?>
      <div class="steps-w">
        <div class="step-triggers">
          <a class="step-trigger active" href="#stepContent1">First</a><a class="step-trigger" href="#stepContent2">Second</a><a class="step-trigger" href="#stepContent3">Third</a>
        </div>
        <div class="step-contents">
          <div class="step-content active" id="stepContent1">
            <div class="row">
      <h5 class="form-header">
       Congratulations!
      </h5>
      <h4>We recommend using PHP 5.x.x versions for better performance.</h4>
      <?php
        if (session_status() == PHP_SESSION_NONE) {session_start();};
       if($_SESSION['error'] == '1'):?>
        <div class="alert alert-danger">An error occurred during the installation, verify that the credentials of your database and purchase data are correct</div>
      <?php endif;?>
      <p>
        Thank you for purchasing EduAppGT, we are sure that we will be the tool to help you improve your school's processes. <br> <br> Before starting the installation process, please verify that you fulfill all the following conditions . <b> All are required</b> 
      </p>
      <div class="table-responsive" style="margin: 0 auto; text-align:left">
      <table class="table table-lightbor table-lightfont">
        <tr>      
        <td>
                                  <?php
                                            if (is_writable('./application/config/database.php')):?>
                                                         <strong> Required:</strong> <span style="color:green">- application/config/database.php to be writtable</span> <i class="picons-thin-icon-thin-0154_ok_successful_check" style="vertical-align:middle;font-size:18px;color:green"></i>
                                        <?php
                                            else:?>
         <strong> Required:</strong> <span style="color:red">- application/config/database.php to be writtable</span> <i class="picons-thin-icon-thin-0153_delete_exit_remove_close" style="vertical-align:middle;font-size:18px;color:red"></i>
                                        <?php endif;?>
        </td>
        </tr>
        <tr>      
        <td>
                                    <?php
                                            if (is_writable('./application/config/routes.php')):?>
         <strong> Required:</strong> <span style="color:green">- application/config/routes.php to be writtable</span> <i class="picons-thin-icon-thin-0154_ok_successful_check" style="vertical-align:middle;font-size:18px;color:green"></i>
                                        <?php
                                            else:?>
                                                         <strong> Required:</strong> <span style="color:red">- application/config/routes.php to be writtable</span> <i class="picons-thin-icon-thin-0153_delete_exit_remove_close" style="vertical-align:middle;font-size:18px;color:red"></i>
                                        <?php endif;?>

</td>
        </tr>
        <tr>      
        <td>
                            <?php
                                if (in_array  ('curl', get_loaded_extensions())):?>
 <strong> Required:</strong> <span style="color:green">- php CURL function enabled</span> <i class="picons-thin-icon-thin-0154_ok_successful_check" style="vertical-align:middle;font-size:18px;color:green"></i>
                                        <?php
                                            else:?>
                                                 <strong> Required:</strong> <span style="color:red">- php CURL function enabled</span> <i class="picons-thin-icon-thin-0153_delete_exit_remove_close" style="vertical-align:middle;font-size:18px;color:red"></i>
                                        <?php endif;?>
        </td>
        </tr>
      </table>
      </div>
      <legend><span>Verify Purchase</span></legend>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for=""> Username*</label><input class="form-control" placeholder="Codecanyon Username" required="" name="code_username" type="text">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Purchase Code*</label><input class="form-control" placeholder="Purchase Code" name="purchase_code" required="" required type="text">
                </div>
              </div>
            </div>
            <div class="form-buttons-w text-right">
              <a class="btn btn-primary step-trigger-btn" href="#stepContent2"> Continue</a>
            </div>
          </div>
          <div class="step-content" id="stepContent2">
            <div class="row">
              <legend><span>Database Settings</span></legend>
        <p>You must create your database with your hosting provider, if you have doubts you can request this data to the support of your hosting.
              <div class="col-sm-6">
                <div class="form-group">
                  <label for=""> Database Name*</label><input class="form-control" name="database" required placeholder="Database Name" type="text">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Database Hostname*</label><input class="form-control" placeholder="Hostname" name="hostname" type="text">
                </div>
              </div>
        <div class="col-sm-6">
                <div class="form-group">
                  <label for=""> Database username*</label><input class="form-control" required placeholder="Database Username" name="dbusername" type="text">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Database password*</label><input class="form-control" placeholder="Database Password" name="dbpassword" required type="password">
                </div>
              </div>
            </div>
            <div class="form-buttons-w text-right">
              <a class="btn btn-primary step-trigger-btn" href="#stepContent3"> Next</a>
            </div>
          </div>
          <div class="step-content" id="stepContent3">
      <legend><span>System Settings</span></legend>
            <div class="row">
      <div class="form-group col-sm-6">
      <label class="col-form-label" for=""> System Name</label>
        <div class="input-group">
        <div class="input-group-addon">
          <i class="picons-thin-icon-thin-0047_home_flat"></i>
        </div>
        <input class="form-control" placeholder="My School" name="system_name" required type="text">
        </div>
      </div>
      <div class="form-group col-sm-6">
      <label class="col-form-label" for=""> System Title</label>
        <div class="input-group">
        <div class="input-group-addon">
          <i class="picons-thin-icon-thin-0003_write_pencil_new_edit"></i>
        </div>
        <input class="form-control" placeholder="My cool School App" name="system_title" required type="text">
        </div>
        </div>
        <div class="form-group col-sm-6">
        <label class="col-form-label" for=""> Language</label>
          <div class="input-group">
          <div class="input-group-addon">
            <i class="picons-thin-icon-thin-0307_chat_discussion_yes_no_pro_contra_conversation"></i>
          </div>
          <select class="form-control" name="language" required="">
                <option value="">Select</option>
                <option value="english">English</option>
                <option value="spanish">Spanish</option>
                <option value="portuguese">Portuguese</option>
                <option value="hindi">Hindi</option>
                <option value="french">French</option>
                <option value="serbian">Serbian</option>
                <option value="arabic">Arabic</option>
          </select>
        </div>
        </div>
      <div class="form-group col-sm-6">
      <label class="col-form-label" for=""> Currency</label>
        <div class="input-group">
        <div class="input-group-addon">
          <i class="picons-thin-icon-thin-0406_money_dollar_euro_currency_exchange_cash"></i>
        </div>
        <input class="form-control" placeholder="$" name="currency" type="text">
        </div>
        </div>
        <div class="form-group col-sm-12">
        <label class="col-form-label" for=""> Theme</label>
          <div class="input-group">
          <div class="input-group-addon">
            <i class="picons-thin-icon-thin-0307_chat_discussion_yes_no_pro_contra_conversation"></i>
          </div>
          <select class="form-control" name="theme" required="">
                <option value="">Select theme color</option>
                <option value="red">Red</option>
                <option value="blue">Blue</option>
                <option value="yellow">Yellow</option>
                <option value="success">Success</option>
                <option value="main">Main</option>
          </select>
        </div>
        </div>
                <div class="col-sm-6">
                <div class="form-group">
                  <label for=""> Admin username*</label><input class="form-control" required placeholder="Admin Username" name="admin" type="text">
                </div>
              </div>
                    <div class="col-sm-6">
                <div class="form-group">
                  <label for=""> Admin password*</label><input class="form-control" required placeholder="Database Username" name="adminpass" type="password">
                </div>
              </div>
                          <div class="form-buttons-w text-right">
                             <button class="btn btn-primary" type="submit">Finish</button>
                          </div>
          </div>
        </div>
      </div>
         <?php echo form_close();?>
      </div>
  <script src="style/cms/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="style/cms/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="style/cms/bower_components/moment/moment.js"></script>
    <script src="style/cms/bower_components/chart.js/dist/Chart.min.js"></script>
    <script src="style/cms/bower_components/select2/dist/js/select2.full.min.js"></script>
    <script src="style/cms/bower_components/bootstrap-validator/dist/validator.min.js"></script>
    <script src="style/cms/bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="style/cms/bower_components/tether/dist/js/tether.min.js"></script>
    <script src="style/cms/bower_components/bootstrap/js/dist/util.js"></script>
    <script src="style/cms/bower_components/bootstrap/js/dist/alert.js"></script>
    <script src="style/cms/bower_components/bootstrap/js/dist/button.js"></script>
    <script src="style/cms/bower_components/bootstrap/js/dist/carousel.js"></script>
    <script src="style/cms/bower_components/bootstrap/js/dist/collapse.js"></script>
    <script src="style/cms/bower_components/bootstrap/js/dist/dropdown.js"></script>
    <script src="style/cms/bower_components/bootstrap/js/dist/modal.js"></script>
    <script src="style/cms/bower_components/bootstrap/js/dist/tab.js"></script>
    <script src="style/cms/bower_components/bootstrap/js/dist/tooltip.js"></script>
    <script src="style/cms/bower_components/bootstrap/js/dist/popover.js"></script>
  <script src="style/cms/js/main.js?version=3.3"></script>

<script src="<?php echo base_url();?>style/cms/js/toastr.js"></script>

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

  </body>
</html>