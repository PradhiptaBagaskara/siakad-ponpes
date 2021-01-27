<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  ini_set('max_execution_time', 0);
  ini_set('memory_limit','2048M');

  class Install extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();  
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->helper('file');
        $this->load->helper('html');
        $this->load->helper('form');
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
    }
  
  function index()
  {
    // $this->load->view('install/index');
    echo sha1("admin");
    // $this->db->where('admin_id' , 1);
    //   $this->db->update('admin' , array('username'  =>  "admin",'password'  =>  sha1("admin")));
    //   $this->db->where('type', 'system_name');
    //   $this->db->update('settings', array('description' => $this->input->post('system_name')));
    //   $this->db->where('type', 'system_title');
    //   $this->db->update('settings', array('description' => $this->input->post('system_title')));
    //   $this->db->where('type', 'buyer');
    //   $this->db->update('settings', array('description' => $this->input->post('code_username')));
    //   $this->db->where('type', 'skin');
    //   $this->db->update('settings', array('description' => "blue"));
    //   $this->db->where('type', 'language');
    //   $this->db->update('settings', array('description' => "english"));
    //   $this->db->where('type', 'purchase_code');
    //   $this->db->update('settings', array('description' => "085655082415"));
    //   $this->db->where('type', 'currency');
    //   $this->db->update('settings', array('description' => "IDR"));
  }

  function setup()
  {
    $hostname = $this->input->post('hostname');
    $username = $this->input->post('dbusername');
    $password = $this->input->post('dbpassword');
    $dbname   = $this->input->post('database');
    $db_connection = $this->database_connection($hostname, $username, $password, $dbname);
    $purchase_verify    = $this->verify_purchase($this->input->post('purchase_code'));
    if ($db_connection == 'success') 
    {
      $data = read_file('./application/config/database.php');
      $data = str_replace('dbname',    $this->input->post('database'),    $data);
      $data = str_replace('dbusername',   $this->input->post('dbusername'),   $data);
      $data = str_replace('dbpassword',  $this->input->post('dbpassword'),  $data);           
      $data = str_replace('dbhostname',   $this->input->post('hostname'),   $data);
      write_file('./application/config/database.php', $data);
      $data2 = read_file('./application/config/routes.php');
      $data2 = str_replace('install','login',$data2);
      write_file('./application/config/routes.php', $data2);
      $this->load->database();
      $templine = '';
      $lines = file('./uploads/install.sql');
      foreach ($lines as $line) 
      {
        if (substr($line, 0, 2) == '--' || $line == '')
        continue;
        $templine .= $line;
        if (substr(trim($line), -1, 1) == ';') 
        {
          $this->db->query($templine);
          $templine = '';
        }
      }
      $url1 = $_SERVER["REQUEST_URI"];
      $final = str_replace("index.php?install/setup", "", $url1);
      $htaccess= "<IfModule mod_rewrite.c> 
        RewriteEngine On
        RewriteBase $final
        RewriteCond %{REQUEST_URI} ^system.*
        RewriteRule ^(.*)$ /index.php?/$1 [L]
        RewriteCond %{REQUEST_URI} ^application.*
        RewriteRule ^(.*)$ /index.php?/$1 [L]
        RewriteCond %{REQUEST_FILENAME} !-f
        RewriteCond %{REQUEST_FILENAME} !-d
        RewriteRule ^(.*)$ index.php?/$1 [L]
      </IfModule> ";
      file_put_contents(".htaccess", $htaccess);
      $this->db->where('admin_id' , 1);
      $this->db->update('admin' , array('username'  =>  $this->input->post('admin'),'password'  =>  sha1($this->input->post('adminpass'))));
      $this->db->where('type', 'system_name');
      $this->db->update('settings', array('description' => $this->input->post('system_name')));
      $this->db->where('type', 'system_title');
      $this->db->update('settings', array('description' => $this->input->post('system_title')));
      $this->db->where('type', 'buyer');
      $this->db->update('settings', array('description' => $this->input->post('code_username')));
      $this->db->where('type', 'skin');
      $this->db->update('settings', array('description' => $this->input->post('theme')));
      $this->db->where('type', 'language');
      $this->db->update('settings', array('description' => $this->input->post('language')));
      $this->db->where('type', 'purchase_code');
      $this->db->update('settings', array('description' => $this->input->post('purchase_code')));
      $this->db->where('type', 'currency');
      $this->db->update('settings', array('description' => $this->input->post('currency')));
      unlink("application/contollers/Install.php");
      redirect(base_url() , 'refresh');
    }
    else 
    {
      if (session_status() == PHP_SESSION_NONE) {session_start();};
      $_SESSION['error'] = '1';
      redirect(base_url(),'refresh');
    }
  }


  function database_connection($hostname, $username, $password, $dbname) 
  {
    $link = mysqli_connect($hostname, $username, $password, $dbname);
    if (!$link) 
    {
      mysqli_close($link);
      return 'failed';
    }
    $db_selected = mysqli_select_db($link, $dbname);
    if (!$db_selected) {
      mysqli_close($link);
      return "db_not_exist";
    }
    mysqli_close($link);
    return 'success';
  }

  function verify_purchase($purchase_code)
  {
      // if (session_status() == PHP_SESSION_NONE) {session_start();};
      // $ch = curl_init();
      // curl_setopt($ch, CURLOPT_USERAGENT, 'API');
      // curl_setopt($ch, CURLOPT_URL, "http://marketplace.envato.com/api/edge/guateapps/e7u9o96ln3ai8sgy563t57csiio0syy8/verify-purchase:". $purchase_code .".json");
      // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      // $purchase_data = json_decode(curl_exec($ch), true);
      // if(!count($purchase_data['verify-purchase'])) 
      // {
         //$_SESSION['buyer'] = "empty";
		 $_SESSION['buyer'] = "success";
      // } else 
      // {
      //   $_SESSION['buyer'] = $purchase_data['verify-purchase']['buyer'];
      // }
  } 
}