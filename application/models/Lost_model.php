<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Lost Model Class
 *
 * @author Yujin Kim <yujin.gaya@gmail.com>
 * @copyright Copyright (c) 학생문화공간위원회
 * 
 */

class Lost_model extends CI_Model {

    function get(){
        $this->db->order_by("id", "desc");
        $this->db->where('state','lost');
        $articles = $this->db->get('lost');
        return $articles;
    }

    function register($data){
        date_default_timezone_set('Asia/Seoul');
        $lost = array(
            'name' => $this->input->post('name', TRUE),
            'date' => $this->input->post('date', TRUE),
            'image' => $data['file_name'],
            'time_register' => date('Y-m-d H:i:s')
        );
        $this->db->insert('lost',$lost);
    }

    function found($id){
        $this->db->where($id);
        $this->db->update('lost',array('state'=>'found'));
    }
}
