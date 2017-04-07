<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Ask_Model
 *
 * @author Yujin Kim <yujin.gaya@gmail.com>
 * @copyright Copyright (c) 학생문화공간위원회
 * 
 *
 * Handles DB related to asks, including writing, getting, etc.
 *
 */

class Ask_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    function get($offset = 0, $limit = 10, $order = "desc"){
        $this->db->select('tag, state, title, writer_id, time_post, ask.id, name');
        $this->db->join('user', 'ask.writer_id = user.student_id');
        $this->db->order_by("state");
        $this->db->order_by("time_post", $order);
        $asks = $this->db->get('ask', $limit, $offset);
        return $asks->result();
    }

    function count(){
        return $this->db->count_all_results('ask');
    }

    function view($id){
        $hit = 'UPDATE `ask` SET `hit` = `hit` + 1 WHERE `id` = ?';
        $this->db->query($hit, $id);
        $this->db->join('user','ask.writer_id = user.student_id');
        $ask = $this->db->get_where('ask', array('ask.id' => $id));
        return $ask->result()[0];
    }

    function get_comments($id){
        $this->db->select('ask_comment.id AS id, state, writer_id, ask_id, time_post, time_edit, content, student_id, name, phone, email, type');
        $this->db->order_by("time_post", "asc");
        $this->db->join('user','ask_comment.writer_id = user.student_id');
        $comments = $this->db->get_where('ask_comment', array('ask_id'=>$id));
        return $comments->result_array();
    }

    function write($image_data){
        date_default_timezone_set('Asia/Seoul');

        if (trim($this->input->post('title', TRUE)) == '' ||
            trim($this->input->post('content', TRUE)) == '') show_error('제목과 내용은 반드시 작성돼야 합니다.');

        $content = $this->input->post('content', TRUE);
        if ($image_data !== NULL){
            $content = '<img class="img-responsive" src="/uploads/image/ask/'.$image_data['file_name'].'"alt="'.$image_data['file_name'].'"><div class="spacing"></div>'.$content;
        }
        $ask = array(
            'time_post' => date('Y-m-d H:i:s'),
            'title' => htmlspecialchars($this->input->post('title', TRUE)),
            'content' => $content,
            'tag' => json_encode($this->input->post('tag', TRUE)),
            'writer_id' => $_SESSION['student_id']
        );

        $this->db->insert('ask',$ask);

    }

    function write_comment($id){
        date_default_timezone_set('Asia/Seoul');
        $comment = array(
            'ask_id' => (int)$id,
            'time_post' => date('Y-m-d H:i:s'),
            'content' => $this->input->post('comment',TRUE),
            'writer_id' => $_SESSION['student_id'],
            'state' => 'wait'
        );
        $this->db->insert('ask_comment',$comment);
    }

    function write_comment_admin($id){
        if ($_SESSION['type'] != 'admin') show_error('권한없음');
        $comment = array(
            'ask_id' => (int)$id,
            'time_post' => date('Y-m-d H:i:s'),
            'content' => $this->input->post('comment',TRUE),
            'writer_id' => $_SESSION['student_id'],
            'state' => $this->input->post('state', TRUE)
        );
        $this->db->insert('ask_comment',$comment);
        $this->db->where('id', $id);
        $this->db->update('ask',array('state'=> $this->input->post('state',TRUE)));
    }

    function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('ask');
    }

    function delete_comment($id){
        $this->db->select('ask_id')
                    ->where('id', $id);
        $ask_id = $this->db->get('ask_comment')->row()->ask_id;
        $this->db->where('id', $id);
        $this->db->delete('ask_comment');
        return $ask_id;
    }
}
