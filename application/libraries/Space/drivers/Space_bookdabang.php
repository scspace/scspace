<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Bookdabang Class
 *
 * @author  Yujin Kim
 *
*/

class Space_bookdabang extends CI_Driver {

    private $ci;

    function __construct(){
        $this->ci =& get_instance();
    }

    public function make(){
        $post = $this->ci->input->post(array(
            'space',
            'organization_name',
            'event_name',
            'entry',
            'purpose',
            'content',
            'promote',
            'time',
            'type_equipment'
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
                'promote' => $post['promote'],
                'time' => $post['time'],
                'type_equipment' => $post['type_equipment']
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

        if ( ! $this->is_valid_start_time($from, $to, 7)) return '책다방은 적어도 행사 7일 전 오후 9시까지 예약해야합니다.';

        if ( ! $this->is_valid_end_time($from, $to, 45)) return '책다방은 예약 45일 전 오후 9시부터 예약할 수 있습니다.';

        return TRUE;
    }
}
