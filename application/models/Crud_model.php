<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Crud_model extends CI_Model 
{
    function __construct() 
    {
      parent::__construct();
    }

    function clear_cache() 
    {
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    public function checkUser($userData = array())
    {
      $credential = array('g_oauth' => $userData['oauth_uid']);
      $query = $this->db->get_where('admin', $credential);
   
      if ($query->num_rows() > 0) 
      {
        return 'success';
      }
      $query = $this->db->get_where('teacher', $credential);
      if ($query->num_rows() > 0) 
      {
        return 'success';
      }
      $query = $this->db->get_where('student', $credential);
      if ($query->num_rows() > 0) 
      {
        return 'success';
      }
      $query = $this->db->get_where('parent', $credential);
      if ($query->num_rows() > 0) 
      {
        return 'success';                  
      } 
    }

    function income($month)
    {
      $income = $this->db->get_where('payment', array('month' => $month, 'payment_type' => 'income'))->result_array();
      $total = 0;
      foreach($income as $row)
      {
        $total += $this->db->get_where('invoice', array('invoice_id' => $row['invoice_id']))->row()->amount;
      }
      return $total;
    }

    function expense($month)
    {
      $expese = $this->db->get_where('payment', array('month' => $month,'payment_type' => 'expense'))->result_array();
      $total = 0;
      foreach($expese as $row)
      {
        $total += $row['amount'];
      }
      return $total;
    }

    public function checkusername($username)
    {
      $credential = array('username' => $username);
      $query = $this->db->get_where('admin', $credential);
      if ($query->num_rows() > 0) 
      {
        return 'success';
      }
      $query = $this->db->get_where('teacher', $credential);
      if ($query->num_rows() > 0) 
      {
        return 'success';
      }
      $query = $this->db->get_where('student', $credential);
      if ($query->num_rows() > 0) 
      {
        return 'success';
      }
      $query = $this->db->get_where('parent', $credential);
      if ($query->num_rows() > 0) 
      {
        return 'success';                  
      } 
    }

    public function checkUser2($userID)
    {
      $credential = array('fb_id' => $userID);
      $query = $this->db->get_where('admin', $credential);
   
      if ($query->num_rows() > 0) 
      {
        return 'success';
      }
      $query = $this->db->get_where('teacher', $credential);
      if ($query->num_rows() > 0) 
      {
        return 'success';
      }
      $query = $this->db->get_where('student', $credential);
      if ($query->num_rows() > 0) 
      {
        return 'success';
      }
      $query = $this->db->get_where('parent', $credential);
      if ($query->num_rows() > 0) 
      {
        return 'success';                  
      } 
    }

    function get_type_name_by_id($type, $type_id = '', $field = 'name') {
        return $this->db->get_where($type, array($type . '_id' => $type_id))->row()->$field;
    }

     function delete_cache($uri_string=null)
     {
        $CI =& get_instance();
        $path = $CI->config->item('cache_path');
        $path = rtrim($path, DIRECTORY_SEPARATOR);
        $cache_path = ($path == '') ? APPPATH.'cache/' : $path;
        $uri =  $CI->config->item('base_url').
        $CI->config->item('index_page').
        $uri_string;
        $cache_path .= md5($uri);
        return unlink($cache_path);
    }


   function lost_password($email,$password)
    {
       $email_sub  = get_phrase('recover_your_password');
       $email_msg  = get_phrase('success_password')."<br>";
       $email_msg  .= get_phrase('new_password').": <b>". $password ."<b/><br>.";
       $email_to    =   $email;
       $this->load->library('email'); 
       $from = $this->db->get_where('settings', array('type' => 'system_email'))->row()->description;
       $system_name = $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;
       $this->email->from($from,$system_name);
       $data = array(
           'email_msg' => $email_msg
       );
       $this->email->to($email_to);
       $this->email->subject($email_sub);
       $body = $this->load->view('backend/mails/notify.php',$data,TRUE);
       $this->email->message($body);   
       $this->email->set_newline("\r\n"); 
       $this->email->send();
//        echo $this->email->print_debugger();
    }

    function count_attendance_students($status)
    {
        $timestamp   = strtotime(date('d-m-Y'));
        $this->db->where('timestamp', $timestamp);
        $this->db->where('status', $status);
        $this->db->from('attendance');
        $result = $this->db->count_all_results();
        return $result;
    }

    function clickatell($message = '' , $reciever = '') 
    {
        
        $clickatell_user       = $this->db->get_where('settings', array('type' => 'clickatell_username'))->row()->description;
        $clickatell_password   = $this->db->get_where('settings', array('type' => 'clickatell_password'))->row()->description;
        $clickatell_api_id     = $this->db->get_where('settings', array('type' => 'clickatell_api'))->row()->description;
        $clickatell_baseurl    = "http://api.clickatell.com";
        $text   = urlencode($message);
        $to     = $reciever;
        $url = "$clickatell_baseurl/http/auth?user=$clickatell_user&password=$clickatell_password&api_id=$clickatell_api_id";
        $ret = file($url);
        $sess = explode(":",$ret[0]);
        print_r($sess);echo '<br>';
        if ($sess[0] == "OK") 
        {
            $sess_id = trim($sess[1]);
            $url = "$clickatell_baseurl/http/sendmsg?session_id=$sess_id&to=$to&text=$text";
            $ret = file($url);
            $send = explode(":",$ret[0]);
            print_r($send);echo '<br>';
            if ($send[0] == "ID") 
            {
                echo "successnmessage ID: ". $send[1];
            } else {
                echo "send message failed";
            }
        } else {
            echo "Authentication failure: ". $ret[0];
        }
    }


    function twilio($message = "", $reciever = "") 
    {
        require_once(APPPATH . 'libraries/twilio_library/Twilio.php');
        $account_sid    = $this->db->get_where('settings', array('type' => 'twilio_account'))->row()->description;
        $auth_token     = $this->db->get_where('settings', array('type' => 'authentication_token'))->row()->description;
        $client         = new Services_Twilio($account_sid, $auth_token); 
        $client->account->messages->create(array( 
            'To'        => $reciever, 
            'From'      => $this->db->get_where('settings', array('type' => 'registered_phone'))->row()->description,
            'Body'      => $message   
        ));
    }


    function students_reports($student_name,$parent_email)
    {
       $email_sub  = $this->db->get_where('email_template' , array('task' => 'student_reports'))->row()->subject;
       $email_msg  = $this->db->get_where('email_template' , array('task' => 'student_reports'))->row()->body;
       $STUDENT_NAME    =   $student_name;
       $PARENT_NAME =   $this->db->get_where('parent' , array('email' => $parent_email))->row()->name;
       $email_msg   =   str_replace('[PARENT]' , $PARENT_NAME, $email_msg);
       $email_msg   =   str_replace('[STUDENT]' , $STUDENT_NAME , $email_msg);
       $email_to    =   $parent_email;

       $this->load->library('email'); 
       $from = $this->db->get_where('settings', array('type' => 'system_email'))->row()->description;
       $system_name = $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;
       $this->email->from($from,$system_name);
       $data = array(
           'email_msg' => $email_msg
       );
       $this->email->to($email_to);
       $this->email->subject($email_sub);
       $body = $this->load->view('backend/mails/notify.php',$data,TRUE);
       $this->email->message($body);   
       $this->email->set_newline("\r\n"); 
       $this->email->send();
//       echo $this->email->print_debugger();
    }

    
   function send_homework_notify($class = "" ,$section = "" ,$sub ="",$title = "",$content = "")
    {
        $subj = $this->db->get_where('subject', array('subject_id' => $sub))->row()->name;
        $email_sub  = $this->db->get_where('email_template' , array('task' => 'new_homework'))->row()->subject;
        $email_msg   = $this->db->get_where('email_template' , array('task' => 'new_homework'))->row()->body;
        $email_msg  .=  str_replace('[DESCRIPTION]' , $content, $email_msg);
        $email_msg  .=  str_replace('[TITLE]' , $title, $email_msg);
        $email_msg  .=  str_replace('[SUBJECT]' , $subj, $email_msg);

        $year = $this->db->get_where('settings', array('type' => 'running_year'))->row()->description;
        $students = $this->db->get_where('enroll', array('class_id' => $class, 'section_id' => $section, 'year' => $year))->result_array();
        $mails = array();
        $from = $this->db->get_where('settings', array('type' => 'system_email'))->row()->description;
        $system_name = $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;
        $this->load->library('email'); 
        $data = array(
                'email_msg' => $email_msg
        );
        $this->email->from($from,$system_name);
        foreach($students as $row)
        {
            $this->email->to($this->db->get_where('student', array('student_id' => $row['student_id']))->row()->email);
            $this->email->subject($email_sub);
            $body = $this->load->view('backend/mails/notify.php',$data,TRUE);
            $this->email->message($body);   
            $this->email->set_newline("\r\n"); 
            $this->email->send();
//            echo $this->email->print_debugger();
        }
    }

    function bulk_email($type,$subject, $body)
    {
       $email_sub  = $subject;
       $email_msg  = $body;
       $this->load->library('email'); 
       $from = $this->db->get_where('settings', array('type' => 'system_email'))->row()->description;
       $system_name = $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;
       $data = array(
           'email_msg' => $email_msg
       );
       if($type == 'teacher')
       {    
            $teachers = $this->db->get('teacher')->result_array();
            foreach($teachers as $row)
            {
                $this->email->from($from,$system_name);
                $this->email->to($row['email']);     
                $this->email->subject($email_sub);
                $body = $this->load->view('backend/mails/notify.php',$data,TRUE);
                $this->email->message($body);   
                $this->email->set_newline("\r\n"); 
                $this->email->send();
             //   echo $this->email->print_debugger();
            }
       }
       if($type == 'parent')
       {    
            $parents = $this->db->get('parent')->result_array();
            foreach($parents as $row)
            {
                $this->email->from($from,$system_name);
                $this->email->to($row['email']);     
                $this->email->subject($email_sub);
                $body = $this->load->view('backend/mails/notify.php',$data,TRUE);
                $this->email->message($body);   
                $this->email->set_newline("\r\n"); 
                $this->email->send();
            //    echo $this->email->print_debugger();
            }
       }
       if($type == 'student')
       {    
            $students = $this->db->get('student')->result_array();
            foreach($students as $row)
            {
                $this->email->from($from,$system_name);
                $this->email->to($row['email']);     
                $this->email->subject($email_sub);
                $body = $this->load->view('backend/mails/notify.php',$data,TRUE);
                $this->email->message($body);   
                $this->email->set_newline("\r\n"); 
                $this->email->send();
          //      echo $this->email->print_debugger();
            }
       }
       if($type == 'admin')
       {    
            $admins = $this->db->get('admin')->result_array();
            foreach($admins as $row)
            {
                $this->email->from($from,$system_name);
                $this->email->to($row['email']);     
                $this->email->subject($email_sub);
                $body = $this->load->view('backend/mails/notify.php',$data,TRUE);
                $this->email->message($body);   
                $this->email->set_newline("\r\n"); 
                $this->email->send();
         //       echo $this->email->print_debugger();
            }
       }
    }


    function parent_new_invoice($student_name,$parent_email)
    {
       $email_sub  = $this->db->get_where('email_template' , array('task' => 'parent_new_invoice'))->row()->subject;
       $email_msg  = $this->db->get_where('email_template' , array('task' => 'parent_new_invoice'))->row()->body;
       $STUDENT_NAME    =   $student_name;
       $PARENT_NAME =   $this->db->get_where('parent' , array('email' => $parent_email))->row()->name;
       $email_msg   =   str_replace('[PARENT]' , $PARENT_NAME, $email_msg);
       $email_msg   =   str_replace('[STUDENT]' , $STUDENT_NAME , $email_msg);
       $email_to    =   $parent_email;

       $this->load->library('email'); 
       $from = $this->db->get_where('settings', array('type' => 'system_email'))->row()->description;
       $system_name = $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;
       $this->email->from($from,$system_name);
       $data = array(
           'email_msg' => $email_msg
       );
       $this->email->to($email_to);
       $this->email->subject($email_sub);
       $body = $this->load->view('backend/mails/notify.php',$data,TRUE);
       $this->email->message($body);   
       $this->email->set_newline("\r\n"); 
       $this->email->send();
     //  echo $this->email->print_debugger();
    }

     function student_new_invoice($student_name,$student_email)
    {
       $email_sub  = $this->db->get_where('email_template' , array('task' => 'student_new_invoice'))->row()->subject;
       $email_msg  = $this->db->get_where('email_template' , array('task' => 'student_new_invoice'))->row()->body;
       $STUDENT_NAME    =   $student_name;
       $email_msg   =   str_replace('[STUDENT]' , $STUDENT_NAME , $email_msg);
       $email_to    =   $student_email;

       $this->load->library('email'); 
       $from = $this->db->get_where('settings', array('type' => 'system_email'))->row()->description;
       $system_name = $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;
       $this->email->from($from,$system_name);
       $data = array(
           'email_msg' => $email_msg
       );
       $this->email->to($email_to);
       $this->email->subject($email_sub);
       $body = $this->load->view('backend/mails/notify.php',$data,TRUE);
       $this->email->message($body);   
       $this->email->set_newline("\r\n"); 
       $this->email->send();
    //   echo $this->email->print_debugger();
    }


     function attendance($student_name,$parent_email)
    {
                $email_sub  = $this->db->get_where('email_template' , array('task' => 'student_absences'))->row()->subject;
                $email_msg  = $this->db->get_where('email_template' , array('task' => 'student_absences'))->row()->body;
                $parent_id = $this->db->get_where('student', array('student_id' => $student_id))->row()->parent_id;
            $STUDENT_NAME   =   $student_name;
            $PARENT_NAME    =   $this->db->get_where('parent' , array('email' => $parent_email))->row()->name;
            $email_msg  =   str_replace('[PARENT]' , $PARENT_NAME, $email_msg);
            $email_msg  =   str_replace('[STUDENT]' , $STUDENT_NAME , $email_msg);
            $email_to   =   $parent_email;

                $this->load->library('email'); 
                $from = $this->db->get_where('settings', array('type' => 'system_email'))->row()->description;
                $system_name = $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;
                $this->email->from($from,$system_name);
                $data = array(
                  'email_msg' => $email_msg
                );
                $this->email->to($email_to);
                $this->email->subject($email_sub);
                $body = $this->load->view('backend/mails/notify.php',$data,TRUE);
                $this->email->message($body);   
                $this->email->set_newline("\r\n"); 
                $this->email->send();
    //            echo $this->email->print_debugger();
    }


     function count_attendance_teacher($status)
    {
        $timestamp   = strtotime(date('d-m-Y'));
        $this->db->where('timestamp' , $timestamp);
        $this->db->where('status' , $status);
        $this->db->from('teacher_attendance');
        $result = $this->db->count_all_results();
        return $result;
    }
    
    function get_students($class_id) {
        $query = $this->db->get_where('student', array('class_id' => $class_id));
        return $query->result_array();
    }

    function get_student_info($student_id) {
        $query = $this->db->get_where('student', array('student_id' => $student_id));
        return $query->result_array();
    }

    function create_online_exam()
    {
        $data['type'] = $this->session->userdata('login_type');
        $data['title'] = $this->input->post('title');
        $data['description'] = $this->input->post('description');
        $data['availablefrom'] = $this->input->post('availablefrom');
        $data['availableto'] = $this->input->post('availableto');
        $data['class_id'] = $this->input->post('class_id');
        $data['clock_start'] = $this->input->post('clock_start');
        $data['clock_end'] = $this->input->post('clock_end');
        $data['section_id'] = $this->input->post('section_id');
        $data['subject_id'] = $this->input->post('subject_id');
        $data['duration'] = $this->input->post('duration');
        $data['pass'] = $this->input->post('pass');
        $data['questions'] = $this->input->post('questions');
        $data['teacher_id']  =   $this->session->userdata('login_user_id');
        $data['exam_code'] = substr(md5(rand(100000000, 200000000)), 0, 10);
        $this->db->insert('exams', $data);
    }

     function create_post() 
     {
        $data['title'] = $this->input->post('title');
        $data['type'] = $this->session->userdata('login_type');
        $data['description'] = $this->input->post('description');
        $data['class_id'] = $this->input->post('class_id');
        $data['file_name']         = $_FILES["file_name"]["name"];
        $data['section_id'] = $this->input->post('section_id');
        $data['timestamp'] = strtotime(date("d M,Y"));
        $data['subject_id'] = $this->input->post('subject_id');
        $data['teacher_id']  =   $this->session->userdata('login_user_id');
        $data['post_code'] = substr(md5(rand(100000000, 200000000)), 0, 10);
        $this->db->insert('forum', $data);
        $post_code = $this->db->get_where('forum', array('post_id' => $this->db->insert_id()))->row()->post_code;
        $docs_id            = $this->db->insert_id();
        move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/forum/" . $_FILES["file_name"]["name"]);
        return $post_code;
    }

    function homework_create() 
    {
        $data['title'] = $this->input->post('title');
        $data['description'] = $this->input->post('description');
        $data['time_end'] = $this->input->post('time_end');
        $data['date_end'] = $this->input->post('date_end');
        $data['type'] = $this->input->post('type');
        $data['class_id'] = $this->input->post('class_id');
        $data['file_name']         = $_FILES["file_name"]["name"];
        $data['section_id'] = $this->input->post('section_id');
        $data['user'] = $this->session->userdata('login_type');
        $data['subject_id'] = $this->input->post('subject_id');
        $data['uploader_type']  =   $this->session->userdata('login_type');
        $data['uploader_id']  =   $this->session->userdata('login_user_id');
        $data['homework_code'] = substr(md5(rand(100000000, 200000000)), 0, 10);
        $this->db->insert('homework', $data);
        $homework_code = $this->db->get_where('homework', array('homework_id' => $this->db->insert_id()))->row()->homework_code;
        $doc_id            = $this->db->insert_id();
        move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/homework/" . $_FILES["file_name"]["name"]);
        return $homework_code;
    }

    function public_files($id)
    {
        $data['category_id'] = $id;
        $data['file']         = $_FILES["file_name"]["name"];
        $data['code'] = substr(md5(rand(100000000, 200000000)), 0, 10);
        $this->db->insert('homework', $data);
        $homework_code = $this->db->get_where('homework', array('homework_id' => $this->db->insert_id()))->row()->homework_code;
        move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/public/" . $_FILES["file_name"]["name"]);
    }   

    function update_homework($homework_code) {
        $data['title'] = $this->input->post('title');
        $data['description'] = $this->input->post('description');
        $data['time_end'] = $this->input->post('time_end');
        $this->db->where('homework_code', $homework_code);
        $this->db->update('homework', $data);
    }

    function update_post($post_code) {
        $data['title'] = $this->input->post('title');
        $data['description'] = $this->input->post('description');
        $this->db->where('post_code', $post_code);
        $this->db->update('forum', $data);
    }

    function update_exam($exam_code) {
        $data['type'] = $this->session->userdata('login_type');
        $data['title'] = $this->input->post('title');
        $data['description'] = $this->input->post('description');
        $data['availablefrom'] = $this->input->post('availablefrom');
        $data['availableto'] = $this->input->post('availableto');
        $data['clock_start'] = $this->input->post('clock_start');
        $data['clock_end'] = $this->input->post('clock_end');
        $data['pass'] = $this->input->post('pass');
        $data['questions'] = $this->input->post('questions');
        $data['duration'] = $this->input->post('duration');
        $this->db->where('exam_code', $exam_code);
        $this->db->update('exams', $data);
    }

    function add_questions() {
        $data['question'] = $this->input->post('question');
        $data['exam_id'] = $this->input->post('exam_id');
        $data['exam_code'] = $this->input->post('exam_code');
        $data['optiona'] = $this->input->post('optiona');
        $data['optionb'] = $this->input->post('optionb');
        $data['optionc'] = $this->input->post('optionc');
        $data['optiond'] = $this->input->post('optiond');
        if($this->input->post('correctanswer') == 'A'){
            $data['correctanswer'] = $this->input->post('optiona');
        }
        else if($this->input->post('correctanswer') == 'B'){
            $data['correctanswer'] = $this->input->post('optionb');
        }
        else if($this->input->post('correctanswer') == 'C'){
            $data['correctanswer'] = $this->input->post('optionc');
        }
        else if($this->input->post('correctanswer') == 'D'){
            $data['correctanswer'] = $this->input->post('optiond');
        }
        $data['marks'] = $this->input->post('marks');
        $this->db->insert('questions', $data);
    }

    function create_group()
    {
      $data = array();
      $data['group_message_thread_code'] = substr(md5(rand(100000000, 20000000000)), 0, 15);
      $data['created_timestamp'] = strtotime(date("Y-m-d H:i:s"));
      $data['group_name'] = $this->input->post('group_name');
      if(!empty($_POST['user'])) 
      {
          array_push($_POST['user'], $this->session->userdata('login_type').'_'.$this->session->userdata('admin_id'));
          $data['members'] = json_encode($_POST['user']);
      }
      else
      {
        $_POST['user'] = array();
        array_push($_POST['user'], $this->session->userdata('login_type').'_'.$this->session->userdata('admin_id'));
        $data['members'] = json_encode($_POST['user']);
      }
      $this->db->insert('group_message_thread', $data);
    }

    function update_group($thread_code = "")
    {
      $data = array();
      $data['group_name'] = $this->input->post('group_name');
      if(!empty($_POST['user'])) 
      {
          array_push($_POST['user'], $this->session->userdata('login_type').'_'.$this->session->userdata('admin_id'));
          $data['members'] = json_encode($_POST['user']);
      }
      else{
        $_POST['user'] = array();
        array_push($_POST['user'], $this->session->userdata('login_type').'_'.$this->session->userdata('admin_id'));
        $data['members'] = json_encode($_POST['user']);
      }
      $this->db->where('group_message_thread_code', $thread_code);
      $this->db->update('group_message_thread', $data);
    }

   function send_reply_group_message($message_thread_code) 
   {
        $message    = $this->input->post('message');
        $timestamp  = strtotime(date("Y-m-d H:i:s"));
        $sender     = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
        if ($_FILES['attached_file_on_messaging']['name'] != "") 
        {
          $data_message['attached_file_name'] = $_FILES['attached_file_on_messaging']['name'];
        }
        $data_message['group_message_thread_code']    = $message_thread_code;
        $data_message['message']                = $message;
        $data_message['sender']                 = $sender;
        $data_message['timestamp']              = $timestamp;
        $this->db->insert('group_message', $data_message);
    }


    function create_post_message($post_code = '') 
    {
        $data['message'] = $this->input->post('message');
        $data['post_id'] = $this->db->get_where('forum', array('post_code' => $post_code))->row()->post_id;
        $data['date'] = date("d M Y");
        $data['user_type'] = $this->session->userdata('login_type');
        $data['user_id'] = $this->session->userdata('login_user_id');
        $this->db->insert('forum_message', $data);
    }

    function delete_homework($homework_code) {
        $this->db->where('homework_code', $homework_code);
        $this->db->delete('homework');
    }

     function delete_post($post_code) {
        $this->db->where('post_code', $post_code);
        $this->db->delete('forum');
    }

    function admin_create() {
        $data['name']         =   $this->input->post('name');
        $data['username']     =   $this->input->post('username');
        $data['email']        =   $this->input->post('email');
        $data['password']     =   sha1($this->input->post('password'));
        $data['phone']        =   $this->input->post('phone');
        $data['address']      =   $this->input->post('address');
        $data['owner_status'] =   $this->input->post('owner_status');
        $this->db->insert('admin' , $data);
        $new_admin_id     =   $this->db->insert_id();
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/admin_image/' . $new_admin_id . '.jpg');
    }

    function admin_edit($admin_id) 
    {
        $data['name']         =   $this->input->post('name');
        $data['username']     =   $this->input->post('username');
        $data['email']        =   $this->input->post('email');
        $data['phone']        =   $this->input->post('phone');
        $data['address']      =   $this->input->post('address');
        $data['birthday']     =   $this->input->post('birthday');
        $data['messages'] = $this->input->post('messages');
        $data['notify'] = $this->input->post('notify');
        $data['information'] = $this->input->post('info');
        $data['marks'] = $this->input->post('marks');
        $data['academic'] = $this->input->post('academic');
        $data['attendance'] = $this->input->post('attendance');
        $data['schedules'] = $this->input->post('schedules');
        $data['news'] = $this->input->post('noticeboard');
        $data['library'] = $this->input->post('library');
        $data['be'] = $this->input->post('behavior');
        $data['acc'] = $this->input->post('accounting');
        $data['class'] = $this->input->post('classrooms');
        $data['school'] = $this->input->post('school_bus');
        $data['polls'] = $this->input->post('polls');
        $data['settings'] = $this->input->post('system_settings');
        $data['academic_se'] = $this->input->post('academic_settings');
        $data['files'] = $this->input->post('teacher_files');
        $data['users'] = $this->input->post('users');
        $data['status']       =   1;
        $this->db->where('admin_id' , $admin_id);
        $this->db->update('admin' , $data);
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/admin_image/' . $admin_id . '.jpg');
    }

    function admin_pass($admin_id){
        $data['new_password'] = sha1($this->input->post('new_password'));
        $data['confirm_new_password'] = sha1($this->input->post('confirm_new_password'));
            if ($data['new_password'] == $data['confirm_new_password']) 
            {
                $this->db->where('admin_id', $admin_id);
                $this->db->update('admin', array('password' => $data['new_password']));
            } 
    }

    function admin_delete($admin_id) {
        $this->db->where('admin_id', $admin_id);
        $this->db->delete('admin');
    }

    function delete_questions($question_id) {
        $this->db->where('question_id', $question_id);
        $this->db->delete('questions');
    }

    function get_teachers() {
        $query = $this->db->get('teacher');
        return $query->result_array();
    }

    function get_teacher_name($teacher_id) {
        $query = $this->db->get_where('teacher', array('teacher_id' => $teacher_id));
        $res = $query->result_array();
        foreach ($res as $row)
            return $row['name'];
    }

    function get_teacher_info($teacher_id) {
        $query = $this->db->get_where('teacher', array('teacher_id' => $teacher_id));
        return $query->result_array();
    }

    function get_subjects() {
        $query = $this->db->get('subject');
        return $query->result_array();
    }

    function get_subject_info($subject_id) {
        $query = $this->db->get_where('subject', array('subject_id' => $subject_id));
        return $query->result_array();
    }

    function get_subjects_by_class($class_id) {
        $query = $this->db->get_where('subject', array('class_id' => $class_id));
        return $query->result_array();
    }

    function get_subject_name_by_id($subject_id) {
        $query = $this->db->get_where('subject', array('subject_id' => $subject_id))->row();
        return $query->name;
    }

    function get_class_name($class_id) {
        $query = $this->db->get_where('class', array('class_id' => $class_id));
        $res = $query->result_array();
        foreach ($res as $row)
            return $row['name'];
    }

    function get_class_name_numeric($class_id) {
        $query = $this->db->get_where('class', array('class_id' => $class_id));
        $res = $query->result_array();
        foreach ($res as $row)
            return $row['name_numeric'];
    }

    function get_classes() {
        $query = $this->db->get('class');
        return $query->result_array();
    }

    function get_class_info($class_id) {
        $query = $this->db->get_where('class', array('class_id' => $class_id));
        return $query->result_array();
    }

    function get_exams() {
        $query = $this->db->get_where('exam' , array(
            'year' => $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description
        ));
        return $query->result_array();
    }

    function get_exam_info($exam_id) {
        $query = $this->db->get_where('exam', array('exam_id' => $exam_id));
        return $query->result_array();
    }

    function get_grades() {
        $query = $this->db->get('grade');
        return $query->result_array();
    }

    function get_grade_info($grade_id) {
        $query = $this->db->get_where('grade', array('grade_id' => $grade_id));
        return $query->result_array();
    }

    function get_obtained_marks( $exam_id , $class_id , $subject_id , $student_id) {
        $marks = $this->db->get_where('mark' , array(
                                    'subject_id' => $subject_id,
                                        'exam_id' => $exam_id,
                                            'class_id' => $class_id,
                                                'student_id' => $student_id))->result_array();
                                        
        foreach ($marks as $row) {
            echo $row['mark_obtained'];
            echo $row['labuno'];
            echo $row['labdos'];
            echo $row['labtres'];
            echo $row['labcuatro'];
            echo $row['labcinco'];
            echo $row['labseis'];
            echo $row['labsiete'];
            echo $row['labocho'];
            echo $row['labnueve'];
        }
    }

    function get_highest_marks( $exam_id , $class_id , $subject_id ) {
        $this->db->where('exam_id' , $exam_id);
        $this->db->where('class_id' , $class_id);
        $this->db->where('subject_id' , $subject_id);
        $this->db->select_max('mark_obtained');
        $highest_marks = $this->db->get('mark')->result_array();
        foreach($highest_marks as $row) {
            echo $row['mark_obtained'];
        }
    }

    function get_grade($mark_obtained) 
    {
        $query = $this->db->get('grade');
        $grades = $query->result_array();
        foreach ($grades as $ro) {
            if ($mark_obtained >= $ro['mark_from'] && $mark_obtained <= $ro['mark_upto'])
                echo $ro['grade_point'];
        }
    }

    function create_log($data) {
        $data['timestamp'] = strtotime(date('Y-m-d') . ' ' . date('H:i:s'));
        $data['ip'] = $_SERVER["REMOTE_ADDR"];
        $location = new SimpleXMLElement(file_get_contents('http://freegeoip.net/xml/' . $_SERVER["REMOTE_ADDR"]));
        $data['location'] = $location->City . ' , ' . $location->CountryName;
        $this->db->insert('log', $data);
    }

    function get_system_settings() {
        $query = $this->db->get('settings');
        return $query->result_array();
    }

    function truncate($type) {
        if ($type == 'all') {
            $this->db->truncate('student');
            $this->db->truncate('mark');
            $this->db->truncate('teacher');
            $this->db->truncate('subject');
            $this->db->truncate('class');
            $this->db->truncate('exam');
            $this->db->truncate('grade');
        } else {
            $this->db->truncate($type);
        }
    }

    function get_image_url($type = '', $id = '') {
        if (file_exists('uploads/' . $type . '_image/' . $id . '.jpg'))
            $image_url = base_url() . 'uploads/' . $type . '_image/' . $id . '.jpg';
        else
            $image_url = base_url() . 'uploads/user.jpg';

        return $image_url;
    }

    function get_image_video($type = '', $id = '') 
    {
         if (file_exists('uploads/screen/' . $id . '.jpg'))
            $image_url = base_url() . 'uploads/screen/' . $id . '.jpg';
        else $image_url = base_url() . 'uploads/user.jpg';

        return $image_url;
    }

    function save_study_material_info()
    {
        $data['type'] = $this->session->userdata('login_type');
        $data['timestamp']         = strtotime(date("Y-m-d H:i:s"));
        $data['title']             = $this->input->post('title');
        $data['description']       = $this->input->post('description');
        $data['file_name']         = $_FILES["file_name"]["name"];
        $data['file_type']         = $this->input->post('file_type');
        $data['class_id']          = $this->input->post('class_id');
        $data['subject_id']         = $this->input->post('subject_id');
        $data['teacher_id'] = $this->session->userdata('login_user_id');
        $this->db->insert('document',$data);
        $document_id            = $this->db->insert_id();
        move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/document/" . $_FILES["file_name"]["name"]);
    }

    function teacher_files()
    {
        $fileTypes = array('jpg', 'jpeg', 'gif', 'png', 'zip', 'xlsx', 'pdf', 'doc', 'docx', 'ppt', 'pptx', 'pps', 'ppsx', 'odt', 'xls', 'xlsx', '.mp3', 'wav', 'mp4', 'mov', 'wmv', 'rar', 'txt'); // Allowed file extensions
        $fileParts = pathinfo($_FILES['file_name']['name']);
        if (in_array(strtolower($fileParts['extension']), $fileTypes)) 
        {
            $data['date']         = date('d-m-Y');
            $data['title']        = $this->input->post('title');
            $data['description']  = $this->input->post('description');
            $data['file']         = $_FILES["file_name"]["name"];
            $data['file_code']    = substr(md5(rand(100000000, 200000000)), 0, 10);
            $data['file_type']    = $this->input->post('file_type');
            $data['user']         = $this->session->userdata('login_user_id');
            $this->db->insert('teacher_files',$data);
            move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/teacher_files/" . $_FILES["file_name"]["name"]);
        } 
        else 
        {
            $this->session->set_flashdata('error_message' , "Not allowed.");
            redirect(base_url() . 'admin/files' , 'refresh');
        }
    }
    
    function select_study_material_info()
    {
        
        $this->db->order_by("timestamp", "desc");
        return $this->db->get('document')->result_array(); 
    }

    function create_news() 
    {
        $data['title']               = $this->input->post('title');
        $data['news_code']           = substr(md5(rand(100000000, 200000000)), 0, 10);
        $data['description']         = $this->input->post('description');
        $data['date']                = date('d, M Y');
        $data['users']               = $this->input->post('users');
        $data['type']                = "news";
        $this->db->insert('news', $data);
        $news_code = $this->db->get_where('news' , array('news_id' => $this->db->insert_id()))->row()->news_code;
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/news_images/' . $news_code . '.jpg');
        return $news_code;
    }

    function import_db()
    {
        $this->load->database();
        $this->db->truncate('academic_settings');
        $this->db->truncate('academic_syllabus');
        $this->db->truncate('admin');
        $this->db->truncate('attendance');
        $this->db->truncate('book');
        $this->db->truncate('ci_sessions');
        $this->db->truncate('class');
        $this->db->truncate('class_routine');
        $this->db->truncate('deliveries');
        $this->db->truncate('document');
        $this->db->truncate('dormitory');
        $this->db->truncate('email_template');
        $this->db->truncate('enroll');
        $this->db->truncate('events');
        $this->db->truncate('exam');
        $this->db->truncate('exams');
        $this->db->truncate('expense_category');
        $this->db->truncate('notification');
        $this->db->truncate('forum');
        $this->db->truncate('forum_message');
        $this->db->truncate('homework');
        $this->db->truncate('horarios_examenes');
        $this->db->truncate('invoice');
        $this->db->truncate('language');
        $this->db->truncate('libreria');
        $this->db->truncate('mark');
        $this->db->truncate('marks');
        $this->db->truncate('mensaje_reporte');
        $this->db->truncate('message');
        $this->db->truncate('message_thread');
        $this->db->truncate('news');
        $this->db->truncate('news_teacher');
        $this->db->truncate('notice_message');
        $this->db->truncate('online_users');
        $this->db->truncate('parent');
        $this->db->truncate('payment');
        $this->db->truncate('pending_users');
        $this->db->truncate('polls');
        $this->db->truncate('poll_response');
        $this->db->truncate('questions');
        $this->db->truncate('reporte_alumnos');
        $this->db->truncate('reporte_mensaje');
        $this->db->truncate('reports');
        $this->db->truncate('report_response');
        $this->db->truncate('request');
        $this->db->truncate('section');
        $this->db->truncate('settings');
        $this->db->truncate('student');
        $this->db->truncate('students_request');
        $this->db->truncate('student_exam');
        $this->db->truncate('student_question');
        $this->db->truncate('subject');
        $this->db->truncate('teacher');
        $this->db->truncate('teacher_attendance');
        $this->db->truncate('teacher_files');
        $this->db->truncate('ticket');
        $this->db->truncate('ticket_message');
        $this->db->truncate('transport');

        $file_n = $_FILES["file_name"]["name"];
        move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/" . $_FILES["file_name"]["name"]);
        $filename = "uploads/".$file_n;
        $mysql_host = $this->db->hostname;
        $mysql_username = $this->db->username;
        $mysql_password = $this->db->password;
        $mysql_database = $this->db->database;
        mysql_connect($mysql_host, $mysql_username, $mysql_password) or die('Error connect to MySQL: ' . mysql_error());
        mysql_select_db($mysql_database) or die('Error to connect MySQL: ' . mysql_error());
        $templine = '';
        $lines = file($filename);
        foreach ($lines as $line)
        {
                if (substr($line, 0, 2) == '--' || $line == '')
                {
                    continue;
                }
                $templine .= $line;
                if (substr(trim($line), -1, 1) == ';')
                {
                    mysql_query($templine) or print('Error \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
                    $templine = '';
                if (mysql_errno() == 1062) 
                {
                print 'no way!';
                }
            }
        }
        unlink("uploads/" . $file_n);
        $this->session->set_flashdata('flash_message' , "Import success");
    }

    function create_event() 
    {
        $data['title']               = $this->input->post('title');
        $data['news_code']           = substr(md5(rand(100000000, 200000000)), 0, 10);
        $data['description']         = $this->input->post('description');
        $data['date']                = date('d, M Y');
        $data['users']               = $this->input->post('users');
        $data['from_']               = $this->input->post('from');
        $data['to_']               = $this->input->post('to');
        $data['type']                = "event";
        $this->db->insert('news', $data);
        $news_code = $this->db->get_where('news' , array('news_id' => $this->db->insert_id()))->row()->news_code;
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/news_images/' . $news_code . '.jpg');
        return $news_code;
    }

    function delete_news($news_code) 
    {
        $this->db->where('news_code', $news_code);
        $this->db->delete('news');
    }

    function delete_unit($academic_syllabus_id) 
    {
        $this->db->where('academic_syllabus_id', $academic_syllabus_id);
        $this->db->delete('academic_syllabus');
    }

    function delete_book($libro_id) {
        $this->db->where('libro_id', $libro_id);
        $this->db->delete('libreria');
    }

    function create_news_message($news_code = '') 
    {
      $admins = $this->db->get('admin')->result_array();
      $notify['notify'] = "<strong>".$this->session->userdata('name')."</strong>". " ". get_phrase('new_comment') ." <b>".$this->db->get_where('news' , array('news_code' => $news_code))->row()->title."</b>";
      foreach($admins as $row)
      {
          $notify['user_id'] = $row['admin_id'];
          $notify['user_type'] = "admin";
          $notify['url'] = "admin/read/".$news_code."/";
          $notify['date'] = date('d M, Y');
          $notify['time'] = date('h:i A');
          $notify['status'] = 0;
          $notify['original_id'] = $this->session->userdata('login_user_id');
          $notify['original_type'] = $this->session->userdata('login_type');
          $this->db->insert('notification', $notify);
        }

        $data['message']      = $this->input->post('message');
        $data['news_id']      = $this->db->get_where('news' , array('news_code' => $news_code))->row()->news_id;
        $data['date']         = date("d M Y");
        $data['user_type']    = $this->session->userdata('login_type');
        $data['user_id']      = $this->session->userdata('login_user_id');
        return $this->db->insert('mensaje_reporte', $data);
    }    

     function create_notice_message($notice_code = '') 
    {
        $data['message']      = $this->input->post('message');
        $data['notice_id']   = $this->db->get_where('news_teacher' , array('notice_code' => $notice_code))->row()->notice_id;
        $data['date']         = date("d M Y");
        $data['user_type']    = $this->session->userdata('login_type');
        $data['user_id']      = $this->session->userdata('login_user_id');
        if ( $_FILES['userfile']['name'] != '')
            $data['message_file_name'] = $_FILES['userfile']['name'];
        $this->db->insert('notice_message', $data);
        if ( $_FILES['userfile']['name'] != '')
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/notice_message_file/' . $_FILES['userfile']['name']);
        
    }   

    function get_pages()
    {
        $this->db->order_by("timestamp", "desc");
        return $this->db->get('pages')->result_array(); 
    }
    
    function select_study_material_info_for_student()
    {
        $student_id = $this->session->userdata('student_id');
        $class_id   = $this->db->get_where('enroll', array('student_id' => $student_id,'year' => $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description))->row()->class_id;
        $this->db->order_by("timestamp", "desc");
        return $this->db->get_where('document', array('class_id' => $class_id))->result_array();
    }
    
    function update_study_material_info($document_id)
    {
        $data['timestamp']      = strtotime($this->input->post('timestamp'));
        $data['title']      = $this->input->post('title');
        $data['description']    = $this->input->post('description');
        $data['class_id']   = $this->input->post('class_id');
        $data['subject_id']     = $this->input->post('subject_id');
        $this->db->where('document_id',$document_id);
        $this->db->update('document',$data);
    }

    function actualizar_poa($document_id)
    {
        $data['timestamp']      = strtotime($this->input->post('timestamp'));
        $data['title']      = $this->input->post('title');
        $data['description']    = $this->input->post('description');
        $data['class_id']   = $this->input->post('class_id');
        $data['subject_id']     = $this->input->post('subject_id');
        $this->db->where('document_id',$document_id);
        $this->db->update('document',$data);
    }
    
    function delete_study_material_info($document_id)
    {
        $this->db->where('document_id',$document_id);
        $this->db->delete('document');
    }

    function delete_page($page_id)
    {
        $this->db->where('page_id',$page_id);
        $this->db->delete('pages');
    }

    function send_new_private_message() 
    {
        $message    = $this->input->post('message');
        $timestamp  = strtotime(date("Y-m-d H:i:s"));
        $reciever   = $this->input->post('reciever');
        $sender     = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
        $num1 = $this->db->get_where('message_thread', array('sender' => $sender, 'reciever' => $reciever))->num_rows();
        $num2 = $this->db->get_where('message_thread', array('sender' => $reciever, 'reciever' => $sender))->num_rows();
        if ($num1 == 0 && $num2 == 0) 
        {
            $message_thread_code                        = substr(md5(rand(100000000, 20000000000)), 0, 15);
            $data_message_thread['message_thread_code'] = $message_thread_code;
            $data_message_thread['sender']              = $sender;
            $data_message_thread['reciever']            = $reciever;
            $this->db->insert('message_thread', $data_message_thread);
        }
        if ($num1 > 0)
        {
            $message_thread_code = $this->db->get_where('message_thread', array('sender' => $sender, 'reciever' => $reciever))->row()->message_thread_code;
        }
        if ($num2 > 0)
        {
            $message_thread_code = $this->db->get_where('message_thread', array('sender' => $reciever, 'reciever' => $sender))->row()->message_thread_code;
        }
        $data_message['message_thread_code']    = $message_thread_code;
        $data_message['message']                = $message;
        $data_message['sender']                 = $sender;
        $data_message['reciever']               = $reciever;
        $data_message['timestamp']              = $timestamp;
        $data_message['file_name']              = $_FILES["file_name"]["name"];
        $this->db->insert('message', $data_message);


        $notify['notify'] = "<strong>". $this->session->userdata('name')."</strong>". " ". get_phrase('new_message_notify');
        $rec = explode("-", $this->input->post('reciever'));
        $notify['user_id'] = $rec[1];
        $notify['user_type'] = $rec[0];
        $notify['url'] = $rec[0]."/message/message_read/".$message_thread_code."/";
        $notify['date'] = date('d M, Y');
        $notify['time'] = date('h:i A');
        $notify['status'] = 0;
        $notify['original_id'] = $this->session->userdata('login_user_id');
        $notify['original_type'] = $this->session->userdata('login_type');
        $this->db->insert('notification', $notify);
        return $message_thread_code;
    }

    function send_reply_message($message_thread_code) 
    {
        $message    = $this->input->post('message');
        $timestamp  = strtotime(date("Y-m-d H:i:s"));
        $sender     = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');

        $data_message['file_name']              = $_FILES["file_name"]["name"];
        $data_message['message_thread_code']    = $message_thread_code;
        $data_message['message']                = $message;
        $data_message['sender']                 = $sender;
        $data_message['timestamp']              = $timestamp;
        $data_message['reciever'] = $this->input->post('reciever');
        $this->db->insert('message', $data_message);
        $reci;
        $notify['notify'] = "<strong>".$this->session->userdata('name')."</strong>". " ". get_phrase('new_message_notify');
        $rec = explode("-", $this->input->post('reciever'));
        if($rec[0] == "parent"){
          $reci = "parents";
        }else{
          $reci = $rec[0];
        }
        $notify['user_id'] = $rec[1];
        $notify['user_type'] = $rec[0];
        $notify['date'] = date('d M, Y');
        $notify['time'] = date('h:i A');
        $notify['url'] = $reci."/message/message_read/".$message_thread_code."/";
        $notify['status'] = 0;
        $notify['original_id']   = $this->session->userdata('login_user_id');
        $notify['original_type'] = $this->session->userdata('login_type');
        $this->db->insert('notification', $notify);
    }

    function mark_thread_messages_read($message_thread_code) {
        $current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
        $this->db->where('sender !=', $current_user);
        $this->db->where('message_thread_code', $message_thread_code);
        $this->db->update('message', array('read_status' => 1));
    }
    
    function create_report() 
    {
        $data['title']          = $this->input->post('title');
        $data['report_code']    = substr(md5(rand(100000000, 20000000000)), 0, 15);
        $data['priority']       = $this->input->post('priority');
        $data['teacher_id']     = $this->input->post('teacher_id');
        $data['status']     = 0;
        $login_type             = $this->session->userdata('login_type');
        if($login_type == 'student') $data['student_id']  = $this->session->userdata('login_user_id');
        else $data['student_id']  = $this->input->post('student_id');
        $data['timestamp']      = date("d M, Y");
        $data['description']       = $this->input->post('description');
        if($_FILES['file']['name'] != '') $data['file']          = $_FILES['file']['name'];
        $this->db->insert('reporte_alumnos', $data);
        move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/reportes_alumnos/' . $_FILES['file']['name']);
    }

     function delete_report($report_code) {
        $this->db->where('report_code', $report_code);
        $this->db->delete('reporte_alumnos');
    }

    function count_unread_message_of_thread($message_thread_code) {
        $unread_message_counter = 0;
        $current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
        $messages = $this->db->get_where('message', array('message_thread_code' => $message_thread_code))->result_array();
        foreach ($messages as $row) {
            if ($row['sender'] != $current_user && $row['read_status'] == '0')
                $unread_message_counter++;
        }
        return $unread_message_counter;
    }

    function permission_request()
    {
        $data['teacher_id']   = $this->session->userdata('login_user_id');
        $data['description']  = $this->input->post('description');
        $data['title']        = $this->input->post('title');
        $data['start_date']   = $this->input->post('start_date');
        $data['end_date']     = $this->input->post('end_date');
        $data['file']         = $_FILES["file_name"]["name"];

        $this->db->insert('request', $data);
    }


    function welcome_user($id)
    {
        $user_email = $this->db->get_where('pending_users', array('user_id' => $id))->row()->email;
        $user_name = $this->db->get_where('pending_users', array('user_id' => $id))->row()->name;
        $username = $this->db->get_where('pending_users', array('user_id' => $id))->row()->username;
        $type = $this->db->get_where('pending_users', array('user_id' => $id))->row()->type;
        $email_sub    =   "Welcome ". $user_name;
        $email_msg   .=   "Hi <strong>".$user_name.",</strong><br><br>";
        $email_msg   .=  "A new account has been created with your email address in ".base_url()."<br><br>";
        $email_msg   .=  "Your data are as follows:<br><br>";
        $email_msg   .=  "<strong>Name:</strong> ".$user_name."<br/>";
        $email_msg   .=  "<strong>Email:</strong> ".$user_email."<br/>";
        $email_msg   .=  "<strong>Username:</strong> ".$username."<br/>";
        $email_msg   .=  "<strong>Account type:</strong> ".ucwords($type)."<br/>";
        $email_msg   .=  "<strong>Password:</strong> ********<br/><br/>";
        $email_msg   .=  "<strong>NOTE:</strong> At the moment you can not log in until an administrator approves your account, you will be notified about the status of your account.<br/><br>";
        $this->load->library('email');
        $this->email->set_newline("\r\n");
        $from = $this->db->get_where('settings', array('type' => 'system_email'))->row()->description;
        $name = $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;
        $CLIENT_NAME  = $user_name;
        $CLIENT_EMAIL = $user_email;
        $this->email->from($from,$name);
        $data = array(
            'email_msg' => $email_msg
        );
        $this->email->to($CLIENT_EMAIL);
        $this->email->subject($email_sub);
        $body = $this->load->view('backend/mails/notify.php',$data,TRUE);
        $this->email->message($body);   
        $this->email->send();
    //    echo $this->email->print_debugger();
    }

    function account_confirm($type = '', $id = '')
    {
        $user_email = $this->db->get_where($type, array($type.'_id' => $id))->row()->email;
        $user_name = $this->db->get_where($type, array($type.'_id' => $id))->row()->name;
        $username = $this->db->get_where($type, array($type.'_id' => $id))->row()->username;
        $email_sub    =   "Congratulations! ";
        $email_msg   .=   "Hi <strong>".$user_name.",</strong><br><br>";
        $email_msg   .=  "The site administrator approved your account, you can now login. <br><br>";
        $email_msg   .=  "Your data are as follows:<br><br>";
        $email_msg   .=  "<strong>Name:</strong> ".$user_name."<br/>";
        $email_msg   .=  "<strong>Email:</strong> ".$user_email."<br/>";
        $email_msg   .=  "<strong>Username:</strong> ".$username."<br/>";
        $email_msg   .=  "<strong>Password:</strong> ********<br/><br/>";
        $this->load->library('email');
        $this->email->set_newline("\r\n");
        $from = $this->db->get_where('settings', array('type' => 'system_email'))->row()->description;
        $name = $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;
        $CLIENT_NAME  = $user_name;
        $CLIENT_EMAIL = $user_email;
        $this->email->from($from,$name);
        $data = array(
            'email_msg' => $email_msg
        );
        $this->email->to($CLIENT_EMAIL);
        $this->email->subject($email_sub);
        $body = $this->load->view('backend/mails/accept.php',$data,TRUE);
        $this->email->message($body);   
        $this->email->send();
    //    echo $this->email->print_debugger();
    }

    function create_backup() 
    {
        $this->load->dbutil();
        $options = array(
            'format' => 'txt', 
            'add_drop' => TRUE,
            'add_insert' => TRUE,
            'newline' => "\n"
        );
        $tables = array('');
        $file_name = 'system_backup';
        $backup = & $this->dbutil->backup(array_merge($options, $tables));
        $this->load->helper('download');
        force_download($file_name . '.sql', $backup);
    }
}