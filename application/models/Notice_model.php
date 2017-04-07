<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Ask View messages translation for SCSPACE
 *
 * @author Yujin Kim <yujin.gaya@gmail.com>
 * @copyright Copyright (c) 학생문화공간위원회
 * 
 */

class Notice_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    function get($limit = 10){
        if ($limit == 'all'){
            $this->db->order_by("id", "desc");
            $notices = $this->db->get('notice');
            return $notices->result_array();
        } else {
            $this->db->order_by("id", "desc");
            $notices = $this->db->get('notice',$limit);
            return $notices->result_array();
        }
    }

    function view($id){
        $hit = 'UPDATE `notice` SET `hit` = `hit` + 1 WHERE `id` = ?';
        $this->db->query($hit, $id);
        $notice = $this->db->get_where('notice', array('id' => $id));
        return $notice->result()[0];
    }

    function write(){
        date_default_timezone_set('Asia/Seoul');

        if ($this->input->post('title', TRUE) === NULL ||
            trim($this->input->post('title', TRUE)) == '' ||
            $this->input->post('content', TRUE) === NULL ||
            trim($this->input->post('content', TRUE)) == '') show_error('제목과 내용은 반드시 작성돼야 합니다.');

        $content = ($this->input->post('content', TRUE));

        $notice = array(
            'time_post' => date('Y-m-d H:i:s'),
            'title' => $this->input->post('title', TRUE),
            'content' => $content,
            'tag' => $this->input->post('tag', TRUE)
        );
        $this->db->insert('notice',$notice);

    }

    function update(){
        date_default_timezone_set('Asia/Seoul');

        if (trim($this->input->post('title', TRUE)) == '' ||
            trim($this->input->post('content', TRUE)) == '') show_error('제목과 내용은 반드시 작성돼야 합니다.');

        $content = ($this->input->post('content', TRUE));


        $notice = array(
            'time_edit' => date('Y-m-d H:i:s'),
            'title' => $this->input->post('title', TRUE),
            'content' => $content,
            'tag' => $this->input->post('tag', TRUE)
        );
        $this->db->where('id', $this->input->post('id', TRUE));
        $this->db->update('notice', $notice);
    }

    function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('notice');
    }
}
