<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mobile extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        if ($this->validate_auth_key() != 'success')
           die;
    }

    function get_class() {
        $response      =   array();
        $classes       =   $this->db->get('class')->result_array();
        foreach($classes as $row) {
            $data['class_id']     =   $row['class_id'];
            $data['name']         =   $row['name'];
            $data['name_numeric'] =   $row['name_numeric'];
            $data['teacher_id']   =   $row['teacher_id'];
            $sections  =    $this->db->get_where('section' , array('class_id' => $row['class_id']))->result_array();
            $data['sections']     =   $sections;
            array_push($response , $data);
        }
        echo json_encode($response);
    }

    function get_image_url($type = '', $id = '') {
        $type           =   $this->input->post('user_type');
        $id             =   $this->input->post('user_id');
        $response       =   array();

        if (file_exists('uploads/' . $type . '_image/' . $id . '.jpg'))
            $response['image_url'] = base_url() . 'uploads/' . $type . '_image/' . $id . '.jpg';
        else
            $response['image_url'] = base_url() . 'uploads/user.jpg';
        echo json_encode($response);
    }

    function get_system_info() {
        $response['system_name']    =   $this->db->get_where('settings' , array('type' => 'system_name'))->row()->description;
        echo json_encode($response);
    }

    function get_students_of_class() {
        $response       =   array();
        $class_id       =   $this->input->post('class_id');
        $running_year   =   $this->db->get_where('settings' , array('type'   =>  'running_year'))->row()->description;
        $students       =   $this->db->get_where('enroll' , array('class_id' => $class_id , 'year' => $running_year))->result_array();

        foreach ($students as $row) {
            $data['student_id'] =   $row['student_id'];
            $data['roll']       =   $row['roll'];

            $data['name']       =   $this->db->get_where('student' , array('student_id'    =>  $row['student_id']))->row()->name;
            $data['birthday']   =   $this->db->get_where('student' , array('student_id'    =>  $row['student_id']))->row()->birthday;
            $data['gender']     =   $this->db->get_where('student' , array('student_id'    =>  $row['student_id']))->row()->sex;
            $data['address']    =   $this->db->get_where('student' , array('student_id'    =>  $row['student_id']))->row()->address;
            $data['phone']      =   $this->db->get_where('student' , array('student_id'    =>  $row['student_id']))->row()->phone;
            $data['email']      =   $this->db->get_where('student' , array('student_id'    =>  $row['student_id']))->row()->email;
            $data['class']      =   $this->db->get_where('class' ,      array('class_id'    =>  $row['class_id']))->row()->name;
            $data['section']    =   $this->db->get_where('section' ,    array('section_id'  =>  $row['section_id']))->row()->name;
            $parent_id          =   $this->db->get_where('student' ,     array('student_id' =>  $row['student_id']))->row()->parent_id;
            $data['parent_name']=   $this->db->get_where('parent' ,     array('parent_id'   =>  $parent_id))->row()->name;

            $data['image_url']  =   $this->crud_model->get_image_url( 'student' , $row['student_id'] );

            array_push($response , $data);
        }
        echo json_encode($response);
    }

    function get_student_profile_information() {
        $response       =   array();
        $running_year   =   $this->db->get_where('settings' , array('type'   =>  'running_year'))->row()->description;
        $student_id     =   $this->input->post('student_id');
        $roll           =   $this->db->get_where('enroll' , array('student_id' => $student_id , 'year' => $running_year))->row()->roll;
        $class_id       =   $this->db->get_where('enroll' , array('student_id' => $student_id , 'year' => $running_year))->row()->class_id;
        $section_id     =   $this->db->get_where('enroll' , array('student_id' => $student_id , 'year' => $running_year))->row()->section_id;

        $student_profile=   $this->db->get_where('student' , array('student_id' => $student_id))->result_array();

        foreach ($student_profile as $row) {
            $data['student_id'] =   $row['student_id'];
            $data['name']       =   $row['name'];
            $data['birthday']   =   $row['birthday'];
            $data['gender']     =   $row['sex'];
            $data['address']    =   $row['address'];
            $data['phone']      =   $row['phone'];
            $data['email']      =   $row['email'];
            $data['roll']       =   $roll;
            $data['class']      =   $class_id;
            $data['section']    =   $section_id;
            $data['parent_name']=   $this->db->get_where('parent' ,     array('parent_id'   =>  $row['parent_id']))->row()->name;
            $data['image_url']  =   $this->crud_model->get_image_url( 'student' , $row['student_id'] );
            array_push($response , $data);
        }
        echo json_encode($response);
    }

    function get_student_mark_information() {
        $response       =   array();
        $mark_array     =   array();
        $exam_id        =   $this->input->post('exam_id');
        $student_id     =   $this->input->post('student_id');
        $running_year   =   $this->db->get_where('settings' , array('type'   =>  'running_year'))->row()->description;
        $student_marks  =   $this->db->get_where('mark' , array('exam_id'       => $exam_id , 
                                                                'student_id'    => $student_id,
                                                                'year'          => $running_year))->result_array();

        $response['exam_id'] = $exam_id;
        foreach ($student_marks as $row) {
            $data['mark_obtained']      =   $row['mark_obtained'];
            $data['subject']            =   $this->db->get_where('subject' , 
                                                                    array('subject_id' =>  $row['subject_id'],
                                                                            'year'      =>  $running_year))->row()->name;

            $grade                      =   $this->crud_model->get_grade($row['mark_obtained']);
            $data['grade']              =   $grade['name'];
            array_push($mark_array , $data);
        }
        $response['marks'] = $mark_array;
        echo json_encode($response);
    }

    function get_teachers() {
        $response       =   array();
        $teachers       =   $this->db->get('teacher')->result_array();
        foreach ($teachers as $row) {
            $data['teacher_id'] =   $row['teacher_id'];
            $data['name']       =   $row['name'];
            $data['birthday']   =   $row['birthday'];
            $data['gender']     =   $row['sex'];
            $data['address']    =   $row['address'];
            $data['phone']      =   $row['phone'];
            $data['email']      =   $row['email'];
            $data['image_url']  =   $this->crud_model->get_image_url( 'teacher' , $row['teacher_id'] );
            array_push($response , $data);
        }
        echo json_encode($response);
    }

    function get_teacher_profile() {
        $response       =   array();
        $teacher_id     =   $this->input->post('teacher_id');
        $response       =   $this->db->get_where('teacher' , array('teacher_id' => $teacher_id))->row();
        echo json_encode($response);
    }

    function get_parents() {
        $response       =   array();
        $parents       =   $this->db->get('parent')->result_array();
        foreach ($parents as $row) {
            $data['parent_id']  =   $row['parent_id'];
            $data['name']       =   $row['name'];
            $data['profession'] =   $row['profession'];
            $data['address']    =   $row['address'];
            $data['phone']      =   $row['phone'];
            $data['email']      =   $row['email'];
            $data['image_url']  =   $this->crud_model->get_image_url( 'parent' , $row['parent_id'] );
            array_push($response , $data);
        }
        echo json_encode($response);
    }

    function get_parent_profile() {
        $response       =   array();
        $parent_id      =   $this->input->post('parent_id');
        $response       =   $this->db->get_where('parent' , array('parent_id' => $parent_id))->row();
        echo json_encode($response);
    }

    function get_accounting() {
        $response       =   array();
        $month          =   $this->input->post('month');
        $year           =   $this->input->post('year');
        $type           =   $this->input->post('type');
        $start_timestamp=   strtotime("1-".$month."-".$year);
        $end_timestamp  =   strtotime("30-".$month."-".$year);
        $this->db->where("timestamp >=" , $start_timestamp);
        $this->db->where("timestamp <=" , $end_timestamp);
        $this->db->where("payment_type"         , $type);
        $response       =   $this->db->get('payment')->result_array();
        echo json_encode($response);
    }

    function get_attendance() {
        $response       =   array();
        $date           =   $this->input->post('date');
        $month          =   $this->input->post('month');
        $year           =   $this->input->post('year');
        $class_id       =   $this->input->post('class_id');
        $timestamp      =   strtotime($date.'-'.$month.'-'.$year);
        $running_year   =   $this->db->get_where('settings' , array('type'   =>  'running_year'))->row()->description;

        $students       =   $this->db->get_where('enroll' , array('class_id' => $class_id, 'year'=>$running_year))->result_array();
        foreach ($students as $row) {
            $data['student_id']     =   $row['student_id'];
            $data['roll']           =   $row['roll'];
            $data['name']           =   $this->db->get_where('student' , array('student_id'   =>  $row['student_id']))->row()->name;

            $attendance_query       =   $this->db->get_where('attendance' , array('timestamp' => $timestamp , 
                                                                                    'student_id' => $row['student_id']));
            if ( $attendance_query->num_rows() > 0) {
                $attendance_result_row     =   $attendance_query->row();
                $data['status']            =   $attendance_result_row->status;
            }
            else {
                $data['status']            =   '0';
            }

            array_push($response , $data);
        }

        echo json_encode($response);
    }


    function get_class_routine() {

        $response       =   array();
        $class_id       =   $this->input->post('class_id');
        $section_id     =   $this->input->post('section_id');
        $day            =   $this->input->post('day');
        $running_year   =   $this->db->get_where('settings' , array('type'   =>  'running_year'))->row()->description;
        $class_routines =   $this->db->get_where('class_routine' , array('class_id' => $class_id , 
                                                                            'section_id' => $section_id ,
                                                                            'day'   => $day,
                                                                            'year'  => $running_year))->result_array();
        foreach ($class_routines as $row) {
            $data['class_id']       =   $row['class_id'];
            $data['subject']        =   $this->db->get_where('subject',array('subject_id' => $row['subject_id'], 
                                                                                'year'=>$running_year))->row()->name;
            $data['time_start']     =   $row['time_start'];
            $data['time_end']       =   $row['time_end'];
            $data['time_start_min'] =   $row['time_start_min'];
            $data['time_end_min']   =   $row['time_end_min'];
            $data['day']            =   $row['day'];
            
            array_push($response , $data);
        }
        echo json_encode($response);
    }

    function get_subject_name() {

        $response       =   array();
        $subject_id     =   $this->input->post('subject_id');
        $response       =   $this->db->get_where('subject' , array('subject_id' => $subject_id))->row();
        echo json_encode($response);
    }

    function get_event_calendar() {

        $response       =   array();
        $response       =   $this->db->get('noticeboard')->result_array();
        echo json_encode($response);
    }

    function get_exam_list() {
        $running_year   =   $this->db->get_where('settings' , array('type'   =>  'running_year'))->row()->description;
        $response       =   array();
        $response       =   $this->db->get_where('exam', array('year'=>$running_year))->result_array();
        echo json_encode($response);
    }

    function get_subject_of_class() {

        $response       =   array();
        $class_id       =   $this->input->post('class_id');
        $running_year   =   $this->db->get_where('settings' , array('type'   =>  'running_year'))->row()->description;
        $subjects       =   $this->db->get_where('subject' , array('class_id' => $class_id , 'year' => $running_year))->result_array();

        foreach ($subjects as $row) {
            $data['subject_id']         =   $row['subject_id'];
            $data['name']               =   $row['name'];

            $teacher_query              =   $this->db->get_where('teacher' , array('teacher_id' =>  $row['teacher_id']));
            if ( $teacher_query->num_rows() > 0) {
                $teacher_query_row      =   $teacher_query->row();
                $data['teacher_name']   =   $teacher_query_row->name;
            }
            else {
                $data['teacher_name']   =   '';
            }


            array_push($response , $data);
        }
        echo json_encode($response);
    }

    function get_marks() {

        $response       =   array();
        $exam_id        =   $this->input->post('exam_id');
        $class_id       =   $this->input->post('class_id');
        $subject_id     =   $this->input->post('subject_id');
        $running_year   =   $this->db->get_where('settings' , array('type'   =>  'running_year'))->row()->description;

        $marks          =   $this->db->get_where('mark' , array('exam_id' => $exam_id , 
                                                                     'class_id' => $class_id ,
                                                                         'subject_id' => $subject_id,
                                                                            'year'     => $running_year))->result_array();
        foreach ( $marks as $row ) {
            $data['class_id']       =   $row['class_id'];
            $data['student_id']     =   $row['student_id'];
            $data['student_name']   =   $this->db->get_where('student',array('student_id' => $row['student_id']))->row()->name;
            $data['student_roll']   =   $this->db->get_where('enroll',array('student_id' => $row['student_id'], 'year'=>$running_year))->row()->roll;
            $data['exam_id']        =   $row['exam_id'];
            $data['mark_obtained']  =   $row['mark_obtained'];
            
            array_push($response , $data);
        }

        echo json_encode($response);
    }

    function get_loggedin_user_profile() {

        $response       =   array();
        $login_type     =   $this->input->post('login_type');
        $login_user_id  =   $this->input->post('login_user_id');
        $user_profile   =   $this->db->get_where( $login_type , array( $login_type.'_id' => $login_user_id ))->result_array();

        foreach ($user_profile as $row) {
            $data['name']       =   $row['name'];
            $data['email']      =   $row['email'];
            $data['image_url']  =   $this->crud_model->get_image_url( $login_type , $login_user_id );
            break;
        }
        array_push($response , $data);

        echo json_encode($response);

    }


    function update_user_image() {
        $response       =   array();
        $user_type      =   $this->input->post('login_type');
        $user_id        =   $this->input->post('login_user_id');

        $directory      =   'uploads/' . $user_type .  '_image/' . $user_id . '.jpg';
        move_uploaded_file($_FILES['user_image']['tmp_name'], $directory);

        $response       =   array('update_status' => 'success');
        echo json_encode($response);
    }


    function update_user_info() {
        $response       =   array();
        $user_type      =   $this->input->post('login_type');
        $user_id        =   $this->input->post('login_user_id');

        $data['name']   =   $this->input->post('name');
        $data['email']  =   $this->input->post('email');
        $this->db->where( $user_type . '_id' , $user_id);
        $this->db->update( $user_type , $data);


        $response       =   array('update_status' => 'success');
        echo json_encode($response);
    }


    function update_user_password() {
        $response       =   array();
        $user_type      =   $this->input->post('login_type');
        $user_id        =   $this->input->post('login_user_id');

        $old_password   =   sha1( $this->input->post('old_password') );
        $data['password']   =   sha1( $this->input->post('new_password') );
        $this->db->where( $user_type . '_id' , $user_id);
        $this->db->where( 'password' , $old_password);
        $verify_query   =   $this->db->get( $user_type );

        if ( $verify_query->num_rows() > 0 ) {
            $this->db->where( $user_type . '_id' , $user_id);
            $this->db->update( $user_type , $data);

            $response       =   array('update_status' => 'success');
        }
        else {
            $response       =   array('update_status' => 'failed');
        }
        
        echo json_encode($response);
    }

    function get_total_summary() {

        $response       =   array();
        $running_year   =   $this->db->get_where('settings' , array('type'   =>  'running_year'))->row()->description;
        $this->db->where('year' , $running_year);
        $this->db->from('enroll');
        $response['total_student']      = $this->db->count_all_results();
        $response['total_teacher']      = $this->db->count_all('teacher');
        $response['total_parent']       = $this->db->count_all('parent');
        $check          =   array('timestamp'  => strtotime(date('d-m-Y')) , 'status' => '1');
        $query          =   $this->db->get_where('attendance' , $check);
        $present_today  =   $query->num_rows();

        $response['total_present_today'] = $present_today;
        echo json_encode($response);
    }

    function getdata() {

        $response       =   array();
        $postvar        =   $this->input->post('postvar');
        $response       =   $this->db->get_where('table' , array('postvar' => $postvar))->result_array();
        echo json_encode($response);
    }

    function get_children_of_parent() {

        $response       =   array();
        $parent_id      =   $this->input->post('parent_id');
        $response['children']       =   $this->db->get_where('student' , array('parent_id' => $parent_id))->result_array();
        echo json_encode($response);
    }

    function get_child_class_routine() {

    }

    function get_child_exam_marks() {

    }

    function get_child_accounting() {

    }

    function get_own_subjects() {

    }

    function get_own_class_routine() {

    }

    function get_own_marks() {

    }

    function get_single_student_accounting() {

        $response       =   array();
        $student_id     =   $this->input->post("student_id");
        $this->db->where("student_id"         , $student_id);
        $response       =   $this->db->get('invoice')->result_array();
        echo json_encode($response);
    }

    function login() {
        $response       = array();
        $email          = $this->input->post("email");
        $password       = sha1($this->input->post("password"));

        $query = $this->db->get_where('admin', array('email' => $email , 'password' => $password));
        if ($query->num_rows() > 0) {
            $row = $query->row();

            $authentication_key         =   md5( rand(10000, 1000000));
            $response['status']         =   'success';
            $response['login_type']     =   'admin';
            $response['login_user_id']  =   $row->admin_id;
            $response['name']           =   $row->name;
            $response['authentication_key']=$authentication_key;

            $this->db->where('admin_id' , $row->admin_id);
            $this->db->update('admin' , array('authentication_key' => $authentication_key));

            echo json_encode($response);
            return;

        }

        $query = $this->db->get_where('teacher', array('email' => $email , 'password' => $password));
        if ($query->num_rows() > 0) {
            $row = $query->row();

            $authentication_key         =   md5( rand(10000, 1000000));
            $response['status']         =   'success';
            $response['login_type']     =   'teacher';
            $response['login_user_id']  =   $row->teacher_id;
            $response['name']           =   $row->name;
            $response['authentication_key']=$authentication_key;
            $this->db->where('teacher_id' , $row->teacher_id);
            $this->db->update('teacher' , array('authentication_key' => $authentication_key));
            echo json_encode($response);
            return;

        }

        $query = $this->db->get_where('student', array('email' => $email , 'password' => $password));
        if ($query->num_rows() > 0) {
            $running_year   =   $this->db->get_where('settings' , array('type'   =>  'running_year'))->row()->description;

            $row = $query->row();

            $authentication_key         =   md5( rand(10000, 1000000));
            $response['status']         =   'success';
            $response['login_type']     =   'student';
            $response['login_user_id']  =   $row->student_id;
            $response['name']           =   $row->name;
            $response['authentication_key']=$authentication_key;

            $response['class_id']       =   $this->db->get_where('enroll' , array(
                'student_id' => $row->student_id , 'year' => $running_year
            ))->row()->class_id;

            $response['section_id']       =   $this->db->get_where('enroll' , array(
                'student_id' => $row->student_id , 'year' => $running_year
            ))->row()->section_id;
            $this->db->where('student_id' , $row->student_id);
            $this->db->update('student' , array('authentication_key' => $authentication_key));
            echo json_encode($response);
            return;

        }

        $query = $this->db->get_where('parent', array('email' => $email , 'password' => $password));
        if ($query->num_rows() > 0) {
            $row = $query->row();

            $authentication_key         =   md5( rand(10000, 1000000));
            $response['status']         =   'success';
            $response['login_type']     =   'parent';
            $response['login_user_id']  =   $row->parent_id;
            $response['name']           =   $row->name;
            $response['authentication_key']=$authentication_key;

            $response['children']       =   $this->db->get_where('student' , array('parent_id' => $row->parent_id))->result_array();

            $this->db->where('parent_id' , $row->parent_id);
            $this->db->update('parent' , array('authentication_key' => $authentication_key));
            echo json_encode($response);
            return;
        }
        else {
            $response['status']         =   'failed';
        }
        echo json_encode($response);
    }

    function validate_auth_key() {

        if ($this->input->post('authenticate') == 'false')
            return 'success';
        $response                       = array();
        $authentication_key             = $this->input->post("authentication_key");
        $user_type                      = $this->input->post("user_type");

        $query = $this->db->get_where($user_type, array('authentication_key' => $authentication_key));
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $response['status']         =   'success';
            $response['login_type']     =   'admin';
            if ( $user_type == 'admin' )
                $response['login_user_id']  =   $row->admin_id;
            if ( $user_type == 'teacher' )
                $response['login_user_id']  =   $row->teacher_id;
            if ( $user_type == 'student' )
                $response['login_user_id']  =   $row->student_id;
            if ( $user_type == 'parent' )
                $response['login_user_id']  =   $row->parent_id;
            $response['authentication_key']=$authentication_key;
        }
        else {
            $response['status']         =   'failed';
        }
        return $response['status'];
    }
}