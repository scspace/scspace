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

class Calendar_model extends CI_Model {

    /**
     * Make Event in Calendar Table.
     */
    function make($space, $title, $reservation_id = NULL, $time_from, $time_to, $type, $state){
        $event = array(
            'space' => $space,
            'time_from' => $time_from,
            'time_to' => $time_to,
            'title' => $title,
            'reservation_id' => $reservation_id,
            'type' => $type,
            'state' => $state
        );
        $this->db->insert('calendar',$event);
    }

    function get($spaces){
        $events = array();
        foreach($spaces as $space){
            $query =
                "SELECT id, title, DATE_FORMAT(time_from, '%Y-%m-%dT%TZ') AS start, DATE_FORMAT(time_to, '%Y-%m-%dT%TZ') AS `end`, type, state, space
                FROM calendar
                WHERE space = '".$space."' AND
                TIMESTAMPDIFF(DAY, time_from, NOW()) < 7";
            $events = array_merge($events, $this->db->query($query)->result_array());
        }
        return $events;
    }

    function validate($data){

    }

    function update(){
        $data = array(
            'space' => $_POST['space'],
            'title' => $_POST['title'],
            'time_from' => $_POST['time_from'],
            'time_to' => $_POST['time_to'],
        );
        $this->db->where('id', $_POST['id']);
        $this->db->update('calendar', $data);
    }

    function delete(){
        $data = array(
            'state' => 'reject'
        );
        $this->db->where('id', $_POST['id']);
        $this->db->update('calendar', $data);
    }
}
