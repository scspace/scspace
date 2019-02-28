<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Team_Model
 *
 * @author Yujin Kim <yujin.gaya@gmail.com>
 * @copyright Copyright (c) 학생문화공간위원회
 *
 *
 * Handles DB related to asks, including writing, getting, etc.
 *
 */

class DS_Team_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    function register(){
        date_default_timezone_set('Asia/Seoul');

        $team = array(
            'name' => $this->input->post('name'),
            'delegator_id' => $_SESSION['student_id'],
            'time_register' => date('Y-m-d H:i:s'),
            'refund' => $this->input->post('refund')
        );

        $this->db->insert('ds_team',$team);
        $id = $this->db->insert_id();

        $names = $this->input->post('member[name]');
        $student_id = $this->input->post('member[student_id]');

        foreach (range(0, count($names)-1) as $i){

            $member['team_id'] = $id;
            $member['name'] = $names[$i];
            $member['student_id'] = $student_id[$i];

            $this->db->insert('ds_team_member',$member);
        }

        return $id;

    }

    function get_members(){
        $student_id = $_SESSION['student_id'];

        $this->db->select('team_id');
        $this->db->where('student_id',$student_id);
        $teams = $this->db->get('ds_team_member')->result_array();
        $members = array();

        foreach($teams as $team){

            $this->db->select('name, student_id');
            $this->db->where('team_id', $team['team_id']);
            $members_of_this_team = $this->db->get('ds_team_member')->result_array();

            $this->db->select('name');
            $this->db->where('id', $team['team_id']);
            $team_name = $this->db->get('ds_team')->row()->name;

            $members[$team_name] = $members_of_this_team;
        }
        return $members;
    }

    function get_my_teams() {
        $student_id = $_SESSION['student_id'];

        $this->db->select('team_id, ds_team.name AS team_name');
        $this->db->join('ds_team', 'ds_team.id = ds_team_member.team_id');
        $this->db->where('student_id',$student_id);
        return $this->db->get('ds_team_member')->result_array();
    }

    function get(){
        return $this->db->get('ds_team')->result();
    }

    function get_team_info($team_id){
        $this->db->select('ds_team.name AS team_name, time_register, refund, user.student_id, user.name, user.phone, user.email');
        $this->db->where('ds_team.id', $team_id);
        $this->db->join('user', 'user.student_id = ds_team.delegator_id');
        return $this->db->get('ds_team')->row_array();
    }
    function get_members_of_team($team_id){
        $this->db->where('team_id', $team_id);
        return $this->db->get('ds_team_member')->result_array();
    }

}


