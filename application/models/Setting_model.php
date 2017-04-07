<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Setting Model Class
 *
 * @author Yujin Kim <yujin.gaya@gmail.com>
 * @copyright Copyright (c) 학생문화공간위원회
 * 
 *
 * Handles DB related to setting such as account.
 *
 */

class Setting_model extends CI_Model {

    function update_deposit_account(){

        $this->db->where('name', 'bank');
        $this->db->update('setting', array('value' => $this->input->post('bank', TRUE)));

        $this->db->where('name', 'account');
        $this->db->update('setting', array('value' => $this->input->post('account', TRUE)));

        $this->db->where('name', 'holder');
        $this->db->update('setting', array('value' => $this->input->post('holder', TRUE)));

        $this->load->view('success');
    }

    function get_deposit_account(){
        $account = array();

        $this->db->where('name', 'bank');
        $account['bank'] = $this->db->get('setting')->row()->value;

        $this->db->where('name', 'account');
        $account['account'] = $this->db->get('setting')->row()->value;

        $this->db->where('name', 'holder');
        $account['holder'] = $this->db->get('setting')->row()->value;

        return $account;
    }
}
