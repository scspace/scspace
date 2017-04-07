<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User Model Class
 *
 * @author Yujin Kim <yujin.gaya@gmail.com>
 * @copyright Copyright (c) 학생문화공간위원회
 * 
 *
 * Handles DB related to User.
 *
 */

class User_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    /* RETURNS TYPE OF USER */
    function update($student_id, $name, $phone, $email){
        $this->load->database();
        
        $user = array(
            'student_id' => $student_id,
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
        );
        $this->db->where('student_id',$student_id);


        if ($this->db->count_all_results('user') == 0){

            $user['type'] = 'user';
            $this->db->insert('user', $user);
            return 'user';

        } else {

            $this->db->where('student_id', $student_id);
            $this->db->update('user', $user);

            $this->db->where('student_id', $student_id);
            return $this->db->get('user')->result()[0]->type;
        }

    }

    function get_name($id){
        $this->db->select('name');
        return $this->db->get_where('user',array('student_id'=>$id));
    }

}
