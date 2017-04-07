<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Open Space Class
 *
 * @author  Yujin Kim
 *
*/

class Space_open_space extends CI_Driver {

    private $ci;

    function __construct(){
        $this->ci =& get_instance();
        date_default_timezone_set('Asia/Seoul');
    }

    public function make(){
        $post = $this->ci->input->post(array(
            'space',
            'organization_name',
            'event_name',
            'entry',
            'purpose',
            'content',
            'type',
            'place',
            'time',
            'type_equipment',
            'bring_food',
            'deposit',
            'event_content'
        ),TRUE);

        $space = $post['space'];
        $time = $post['time'];
        $time_from = $post['time']['from'];
        $time_to = $post['time']['to'];

        $content = json_encode(
            array(
                'organization_name' => $post['organization_name'],
                'event_name' => $post['event_name'],
                'entry' => $post['entry'],
                'purpose' => $post['purpose'],
                'content' => $post['content'],
                'type' => $post['type'],
                'place' => $post['place'],
                'time' => $post['time'],
                'type_equipment' => $post['type_equipment'],
                'bring_food' => $post['bring_food'],
                'deposit' => $post['deposit'],
                'event_content' => $post['event_content']
            )
        );

        $reservation = array(
            'space' => $space,
            'time_from' => $time_from,
            'time_to' => $time_to,
            'reserver_id' => $_SESSION['student_id'],
            'time_request' => date('Y-m-d H:i:s'),
            'state' => 'wait',
            'content' => $content
        );
        $this->ci->db->insert('reservation',$reservation);
        $reservation_id = $this->ci->db->insert_id();

        $event = array(
            'space' => $space,
            'title' => $post['event_name'],
            'content' => $content,
            'time_from' => $time_from,
            'time_to' => $time_to,
            'reservation_id' => $reservation_id,
            'type' => 'event',
            'state' => 'wait'
        );
        $this->ci->db->insert('calendar', $event);

        $rehearsal = array(
            'space' => $space,
            'title' => $post['event_name'],
            'content' => $content,
            'time_from' => $time['rehearsal_from'],
            'time_to' => $time['rehearsal_to'],
            'reservation_id' => $reservation_id,
            'type' => 'rehearsal',
            'state' => 'wait'
        );
        $this->ci->db->insert('calendar', $rehearsal);
        return $reservation_id;
    }

    public function validate(){
        $post = $this->ci->input->post(array(
            'time',
            'space'
        ),TRUE);

        $space = $post['space'];
        $from = $post['time']['from'];
        $to = $post['time']['to'];

        if ( ! $this->is_ordered($from, $to)) return '예약은 0분 이상이어야합니다.';

        if ( ! $this->is_valid_start_time($from, $to, 7)) return '오픈스페이스는 적어도 행사 7일 전 오후 9시까지 예약해야합니다.';

        if ( ! $this->is_shorter($from, $to, 60*60*24*14)) return '오픈스페이스는 최대 14일까지 사용할 수 있습니다.';

        return TRUE;
    }
}
