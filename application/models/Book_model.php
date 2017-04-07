<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Book_Model
 *
 * @author Yujin Kim <yujin.gaya@gmail.com>
 * @copyright Copyright (c) 학생문화공간위원회
 * 
 *
 * Handles DB related to book.
 *
 */

class Book_model extends CI_Model {

    function get(){
        $this->db->order_by("title");
        $books = $this->db->get('book');
        return $books->result();
    }

    function search($keyword){
        $this->db->from('book');
        $this->db->select('category, title, author, publisher, ISBN');
        $keyword = urldecode($keyword);
        $this->db->where("MATCH (title) AGAINST ('{$keyword}')");
        // $this->db->where("title LIKE '{$keyword}'");
        $books = $this->db->get();
        return $books->result();
    }

}
