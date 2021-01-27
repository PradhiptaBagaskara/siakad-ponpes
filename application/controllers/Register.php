<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Register extends CI_Controller 
{
    function __construct() {
        parent::__construct();
        $this->load->model('crud_model');
        $this->load->database();
        $this->load->library('session');
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2010 05:00:00 GMT");
    }

    public function index() 
    {
        if($this->db->get_where('settings', array('type' => 'register'))->row()->description == 0)
        {
            redirect(base_url(), 'refresh');
        }else{
        $this->load->view('backend/register');
        }
    }

     function search_user() 
    {
        if($_POST['c'] != "")
        {
            $credential = array('username' => $_POST['c']);
            $query = $this->db->get_where('admin', $credential);
            if ($query->num_rows() > 0) 
            {
                echo 'success';
            }
            $query = $this->db->get_where('teacher', $credential);
            if ($query->num_rows() > 0) 
            {
              echo 'success';
            }             
              $query = $this->db->get_where('student', $credential);
            if ($query->num_rows() > 0) 
              {
                echo 'success';
            }
            $query = $this->db->get_where('parent', $credential);
            if ($query->num_rows() > 0) 
            {
                echo 'success';                  
            } 
        }
    }

    function create_account($param1 = '')
    {
        if($param1 == 'teacher')
        {
            $data['name']        = $this->input->post('name');
            $data['username']    = $this->input->post('username');
            $data['address']     = $this->input->post('address');
            $data['phone']       = $this->input->post('phone');
            $data['email']       = $this->input->post('email');
            $data['sex']       = $this->input->post('sex');
            $data['birthday']    = $this->input->post('birthday');
            $data['type']    = "teacher";
            $data['password']    = sha1($this->input->post('password'));
            $this->db->insert('pending_users', $data);
            $user_id = $this->db->insert_id();
            $this->crud_model->welcome_user($user_id);

            $notify['notify'] = "<strong>".get_phrase('register').":</strong>,". " ". get_phrase('reg_teacher') ."<b>".$this->input->post('name')."</b>";
            $admins = $this->db->get('admin')->result_array();
            foreach($admins as $row)
            {
                $notify['user_id'] = $row['admin_id'];
                $notify['user_type'] = 'admin';
                $notify['url'] = "admin/admissions/";
                $notify['date'] = date('d M, Y');
                $notify['time'] = date('h:i A');
                $notify['status'] = 0;
                $notify['original_id'] = "";
                $notify['original_type'] = "";
                $this->db->insert('notification', $notify);
            }
            
            $this->session->set_flashdata('flash_message' , "Your account has been created, however an administrator must approve your account in order to log in, an email will be sent to your email when your account is approved.");
            redirect(base_url() . 'register', 'refresh');
        }
        if($param1 == 'student')
        {
            $data['class_id']    = $this->input->post('class_id');
            $data['section_id']  = $this->input->post('section_id');
            $data['parent_id']   = $this->input->post('parent_id');
            $data['name']        = $this->input->post('name');
            $data['username']    = $this->input->post('username');
            $data['address']     = $this->input->post('address');
            $data['phone']       = $this->input->post('phone');
            $data['email']       = $this->input->post('email');
            $data['sex']         = $this->input->post('sex');
            $data['birthday']    = $this->input->post('birthday');
            $data['roll']        = $this->input->post('roll');
            $data['type']        = "student";
            $data['password']    = sha1($this->input->post('password'));
            $this->db->insert('pending_users', $data);
            $user_id = $this->db->insert_id();
            $this->crud_model->welcome_user($user_id);

             $notify['notify'] = "<strong>".get_phrase('register').":</strong>,". " ". get_phrase('reg_student')."<b>".$this->input->post('name')."</b>";
            $admins = $this->db->get('admin')->result_array();
            foreach($admins as $row)
            {
                $notify['user_id'] = $row['admin_id'];
                $notify['user_type'] = 'admin';
                $notify['url'] = "admin/admissions/";
                $notify['date'] = date('d M, Y');
                $notify['time'] = date('h:i A');
                $notify['status'] = 0;
                $notify['original_id'] = "";
                $notify['original_type'] = "";
                $this->db->insert('notification', $notify);
            }

            $this->session->set_flashdata('flash_message' , "Your account has been created, however an administrator must approve your account in order to log in, an email will be sent to your email when your account is approved.");
            redirect(base_url() . 'register', 'refresh');
        }
        if($param1 == 'parent')
        {
            $data['name']        = $this->input->post('name');
            $data['username']    = $this->input->post('username');
            $data['address']     = $this->input->post('address');
            $data['phone']       = $this->input->post('phone');
            $data['email']       = $this->input->post('email');
            $data['profession']    = $this->input->post('profession');
            $data['type']        = "parent";
            $data['password']    = sha1($this->input->post('password'));
            $this->db->insert('pending_users', $data);
            $user_id = $this->db->insert_id();
            $this->crud_model->welcome_user($user_id);

            $notify['notify'] = "<strong>".get_phrase('register').":</strong>,". " ". get_phrase('reg_parent')."<b>".$this->input->post('name')."</b>";
            $admins = $this->db->get('admin')->result_array();
            foreach($admins as $row)
            {
                $notify['user_id'] = $row['admin_id'];
                $notify['user_type'] = 'admin';
                $notify['url'] = "admin/admissions/";
                $notify['date'] = date('d M, Y');
                $notify['time'] = date('h:i A');
                $notify['status'] = 0;
                $notify['original_id'] = "";
                $notify['original_type'] = "";
                $this->db->insert('notification', $notify);
            }
            $this->session->set_flashdata('flash_message' , "Your account has been created, however an administrator must approve your account in order to log in, an email will be sent to your email when your account is approved.");
            redirect(base_url() . 'register', 'refresh');
        }
    }

}