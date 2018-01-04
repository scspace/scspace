<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Ullim Hall Class
 *
 * @author  Yujin Kim
 *
*/

class Space_ullim_hall extends CI_Driver {

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
            'time',
            'usage_equipment',
            'type_equipment',
            'labor_time',
            'no_chair',
            'no_table',
            '1f_lobby',
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
                'time' => $post['time'],
                'usage_equipment' => $post['usage_equipment'],
                'type_equipment' => $post['type_equipment'],
                'labor_time' => $post['labor_time'],
                'no_chair' => $post['no_chair'],
                'no_table' => $post['no_table'],
                '1f_lobby' => $post['1f_lobby'],
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

        if($time['rehearsal_before_from'] != ''){
            $rehearsal_before = array(
                'space' => $space,
                'title' => $post['event_name'],
                'content' => $content,
                'time_from' => $time['rehearsal_before_from'],
                'time_to' => $time['rehearsal_before_to'],
                'reservation_id' => $reservation_id,
                'type' => 'rehearsal',
                'state' => 'wait'
            );
            $this->ci->db->insert('calendar', $rehearsal_before);

        }
        if($time['rehearsal_from'] != ''){
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
        }

        return $reservation_id;
    }

    public function validate(){
        $post = $this->ci->input->post(array(
            'time',
            'space',
            'usage_equipment'
        ),TRUE);

        $space = $post['space'];
        $from = $post['time']['from'];
        $to = $post['time']['to'];

        if ( ! $this->is_ordered($from, $to)) return '예약은 0분 이상이어야합니다.';

        if ($post['usage_equipment'] == 'yes'){
            if ( ! $this->is_valid_start_time($from, $to, 14)) return '장비를 사용할 경우 울림홀은 적어도 예약 14일 전 오후 9시까지 예약해야합니다.';
        } else {
            if ( ! $this->is_valid_start_time($from, $to, 3)) return '장비를 사용하지 않을 경우 울림홀은 적어도 예약 3일 전 오후 9시까지 예약해야합니다.';
        }

        // if ( ! $this->is_valid_end_time($from, $to, 45)) return '울림홀은 예약 45일 전 오후 9시부터 예약할 수 있습니다.';

        $this->ci->db->where('space', $space);
        $this->ci->db->where('time_from <', $to);
        $this->ci->db->where('time_to >', $from);
        $this->ci->db->where('state', 'grant');
        $this->ci->db->from('calendar');
        if ($this->ci->db->count_all_results() == 0){
            return TRUE;
        } else {
            return '시간이 겹칩니다. 신청서가 서버에 도착하는 사이에 다른 사용자가 예약했을 수도 있습니다.';
        }
    }
}
