<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Piano Room Class
 *
 * @author  Yujin Kim
 *
*/

class Space_piano_room extends CI_Driver {

    private $ci;

    function __construct(){
        $this->ci =& get_instance();
        date_default_timezone_set('Asia/Seoul');
    }

    public function make(){
        $post = $this->ci->input->post(array(
            'time_from',
            'time_to',
            'space'
        ),TRUE);

        $space = $post['space'];
        $time_from = $post['time_from'];
        $time_to = $post['time_to'];

        $reservation = array(
            'space' => $space,
            'time_from' => $time_from,
            'time_to' => $time_to,
            'reserver_id' => $_SESSION['student_id'],
            'time_request' => date('Y-m-d H:i:s'),
            'time_decide' => date('Y-m-d H:i:s'),
            'state' => 'grant'
        );
        $this->ci->db->insert('reservation',$reservation);
        $reservation_id = $this->ci->db->insert_id();

        $event = array(
            'space' => $space,
            'title' => $_SESSION['name'],
            'content' => '',
            'time_from' => $time_from,
            'time_to' => $time_to,
            'reservation_id' => $reservation_id,
            'type' => 'practice',
            'state' => 'grant'
        );
        $this->ci->db->insert('calendar', $event);
        return $reservation_id;
    }

    public function validate(){
        $post = $this->ci->input->post(array(
            'time_from',
            'time_to',
            'space'
        ),TRUE);

        $space = $post['space'];
        $from = $post['time_from'];
        $to = $post['time_to'];

        if ( ! $this->is_ordered($from, $to)) return '예약은 0분 이상이어야합니다.';

        if ( ! $this->is_valid_start_time($from, $to, 1)) return '피아노실은 적어도 예약 하루 전 9시까지 예약해야합니다.';

        if ( ! $this->is_valid_end_time($from, $to, 14)) return '피아노실은 예약 14일 전 9시부터 예약할 수 있습니다.';


        $days_covered = $this->splitTime($from, $to);

        if (count($days_covered) == 2) {
            // 예약이 이틀에 걸쳐있을 때 각각 최대 시간을 넘지 않는지 확인
            $first_day = $days_covered[0];
            $second_day = $days_covered[1];
            $max_duration = // of that specific day
                7200
                - $this->time_used('piano_room_1', $first_day)
                - $this->time_used('piano_room_2', $first_day);
            // echo 'max_duration: '.$max_duration.' day: '.$first_day;
            if ( ! $this->is_shorter($from, $second_day, $max_duration)) return '피아노실은 하루에 최대 2시간까지 사용할 수 있습니다.';

            $max_duration = // of that specific day
                7200
                - $this->time_used('piano_room_1', $second_day)
                - $this->time_used('piano_room_2', $second_day);
            // echo 'max_duration: '.$max_duration.' days_covered: '.$second_day;
            if ( ! $this->is_shorter($second_day, $to, $max_duration)) return '피아노실은 하루에 최대 2시간까지 사용할 수 있습니다.';

        } elseif (count($days_covered) == 1) {
            // 예약이 하루에 걸쳐있을 때 각각 최대 시간을 넘지 않는지 확인
            $day = $days_covered[0];
            $max_duration = // of that specific day
                7200
                - $this->time_used('piano_room_1', $day)
                - $this->time_used('piano_room_2', $day);
            // echo 'max_duration: '.$max_duration.' the_day_cal: '.$day;
            if ( ! $this->is_shorter($from, $to, $max_duration)) return '피아노실은 하루에 최대 2시간까지 사용할 수 있습니다.';
        }



        $this->ci->db->where('space', $space);
        $this->ci->db->where('time_from <', $to);
        $this->ci->db->where('time_to >', $from);
        $this->ci->db->where('state', 'grant');
        $this->ci->db->from('calendar');
        if ($this->ci->db->count_all_results() == 0){
            return TRUE;
        } else {
            show_error('시간이 겹칩니다. 신청서가 서버에 도착하는 사이에 다른 사용자가 예약했을 수도 있습니다.');
        }
    }
}
