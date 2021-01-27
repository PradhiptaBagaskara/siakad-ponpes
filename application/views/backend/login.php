<?php 
   require_once "face/config.php";
   $redirectURL = base_url()."auth/loginfacebook/";
   $permissions = ['email'];
   $loginURL2 = $helper->getLoginUrl($redirectURL, $permissions);
?>

<?php $title = $this->db->get_where('settings' , array('type'=>'system_title'))->row()->description; ?>
<?php $system_name = $this->db->get_where('settings' , array('type'=>'system_name'))->row()->description; ?>
<?php
  // if (session_status() == PHP_SESSION_NONE) {session_start();};
  include_once 'src/Google_Client.php';
  include_once 'src/contrib/Google_Oauth2Service.php';
  $clientId = $this->db->get_where('settings', array('type' => 'google_sync'))->row()->description; //Google client ID
  $clientSecret = $this->db->get_where('settings', array('type' => 'google_login'))->row()->description; //Google client secret
  $redirectURL = base_url().'auth/login/'; //Callback URL
  //Call Google API
  $gClient = new Google_Client();
  $gClient->setApplicationName('google');
  $gClient->setClientId($clientId);
  $gClient->setClientSecret($clientSecret);
  $gClient->setRedirectUri($redirectURL);
  $google_oauthV2 = new Google_Oauth2Service($gClient);
  $authUrl = $gClient->createAuthUrl();
  $output = filter_var($authUrl, FILTER_SANITIZE_URL);
?>
<!DOCTYPE html>
<html lang="es">
  <head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
      
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title><?php echo get_phrase('login');?> | <?php echo $title;?></title>
      <link rel="stylesheet" href="<?php echo base_url();?>style/login/materialdesignicons.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>style/login/vendor.bundle.base.css">
      <link rel="stylesheet" href="<?php echo base_url();?>style/login/vendor.bundle.addons.css"> 
      <link rel="stylesheet" href="<?php echo base_url();?>style/login/style.css">
      <link href="style/cms/favicon.png" rel="shortcut icon">
      <script src="<?php echo base_url();?>assets/js/jquery-1.11.0.min.js"></script>
  </head>
  <body style="background: url('<?php echo base_url();?>uploads/bglogin.jpg'); background-size: cover;background-repeat: no-repeat;">
      <div class="container-scroller">
        <div class="container-fluid full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
              <div class="row w-100 mx-auto">
                  <div class="col-lg-4 mx-auto">
                    <div class="auto-form-wrapper"><br>
                    <center><img style="max-width: 65%; height: auto; display:block;" src="<?php echo base_url();?>uploads/logo-color.png"></center><br><br>
                    <?php if($this->session->userdata('error') == '1'):?>    
                        <div class="form-login-error">
                          <center><div class="alert alert-danger"><?php echo get_phrase('login_error');?></div></center>
                        </div>
                    <?php endif;?>
                    <?php if($this->session->userdata('failed') == '1'):?>
                      <div class="alert alert-danger" style="text-align: center; font-weight: bold;"><?php echo get_phrase('social_error');?></div>
                    <?php endif;?>

                    <?php if($this->session->userdata('failedf') == '1'):?>
                      <div class="alert alert-danger" style="text-align: center; font-weight: bold;"><?php echo get_phrase('social_error');?></div>
                    <?php endif;?>
                    <form method="post" role="form" action="<?php echo base_url();?>login/auth/">
                          <div class="form-group">
                              <label class="label"><?php echo get_phrase('username');?></label>
                              <div class="input-group">
                                <input type="text" class="form-control" name="username" id="user" required="" placeholder="<?php echo get_phrase('username');?>">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="mdi mdi-check-circle-outline"></i></span>
                                </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="label"><?php echo get_phrase('password');?></label>
                              <div class="input-group">
                                <input type="password" class="form-control" name="password" id="password" required="" placeholder="*********">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="mdi mdi-check-circle-outline"></i></span>
                                </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <button type="submit" class="btn btn-primary submit-btn btn-block"><?php echo get_phrase('login');?></button>
                          </div>
                          </form>
                          <div class="form-group d-flex justify-content-between">
                              <div class="form-check form-check-flat mt-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" checked>Stay connected</label>
                              </div>
                              <a href="<?php echo base_url();?>login/lost_password/" class="text-small forgot-password text-black"><?php echo get_phrase('recover_your_password');?></a>
                          </div>
                          <?php if($this->db->get_where('settings', array('type' => 'social_login'))->row()->description == 1):?>
                          <div class="form-group">
                              <a class="btn btn-block g-login" href="<?php echo $output;?>"><img class="mr-3" src="<?php echo base_url();?>uploads/icon-google.svg"><?php echo get_phrase('login_google');?></a>
                                <a class="btn btn-block g-login" href="<?php echo $loginURL2;?>"><img class="mr-3" style="width: 32px;" src="<?php echo base_url();?>uploads/icon-facebook.png"><?php echo get_phrase('login_facebook');?></a>
                          </div><?php endif;?><hr>
                          <?php if($this->db->get_where('settings', array('type' => 'register'))->row()->description == 1):?>
                            <ul class="auth-footer">
                              <li><a href="<?php echo base_url();?>register/" style="color: #000; font-weight: bold;"><?php echo get_phrase('register');?></a></li>                              
                          </ul>
                          <?php endif;?>
                          <hr>
                          <p class="footer-text text-center" style="color: #000;"><b>&copy;</b> Copyright all rights reserved.</p>
                    </div>
                  </div>
              </div>
            </div>
        </div>
      </div>
      <script src="<?php echo base_url();?>style/login/template.js"></script>
  </body>
</html>