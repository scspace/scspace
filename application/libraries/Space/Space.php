<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Space Class
 *
 * @author  Yujin Kim
 *
*/

class Space extends CI_Driver_Library {

    public $valid_drivers;
    private $ci;

    function __construct(){
        $this->valid_drivers = array(
            'piano_room',
            'individual_practice_room',
            'dance_studio',
            'multipurpose_room',
            'seminar_room',
            'group_practice_room',
            'ullim_hall',
            'mirae_hall',
            'open_space',
            'bookdabang',
            'workshop'
        );
        $this->ci =& get_instance();
    }

    function toStamp($time){
        $time = trim($time);
        switch ($time) {
            case (preg_match('/^(\d{4})-(\d{2})-(\d{2})T(\d{2}):(\d{2})$/', $time) == 1):
                return date_create_from_format('Y-m-d\TH:i', $time)->getTimestamp();
                break;

            case (preg_match('/^(\d{4})-(\d{2})-(\d{2})T(\d{2}):(\d{2}):(\d{2})$/', $time) == 1):
                return date_create_from_format('Y-m-d\TH:i:s', $time)->getTimestamp();
                break;

            case (preg_match('/^(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})$/', $time) == 1):
                return date_create_from_format('Y-m-d H:i:s', $time)->getTimestamp();
                break;

            case (preg_match('/^(\d{4})-(\d{2})-(\d{2})T(\d{2}):(\d{2}):(\d{2})Z$/', $time) == 1):
                return date_create_from_format('Y-m-d\TH:i:s\Z', $time)->getTimestamp();
                break;

            case (preg_match('/^(\d{4})-(\d{2})-(\d{2})$/', $time) == 1):
                $time .= ' 00:00:00';
                return date_create_from_format('Y-m-d H:i:s', $time)->getTimestamp();
                break;

            case (preg_match('/^(\d{4})-(\d{2})-(\d{2})T(\d{2}):(\d{2}):(\d{2}).(\d{3})Z$/', $time) == 1):
                return date_create_from_format('Y-m-d\TH:i:s.u\Z', $time)->getTimestamp();
                break;

            default:
                show_error($time.'은 등록되지 않은 시간 포맷입니다. 입력한 시간 포맷을 학생문화공간위원회에 전달해주세요.');
        }
    }

    function space_to_name($space){
        if (in_array($space, array('piano_room_1','piano_room_2'))) return 'piano_room';
        if (in_array($space, array('individual_practice_room_1','individual_practice_room_2','individual_practice_room_3'))) return 'individual_practice_room';
        if (in_array($space, array('seminar_room_1','seminar_room_2'))) return 'seminar_room';
        return $space;
    }

    // $space_name 은 url로 전달되는 값이라 에러를 일으킬 수 있음. 404 처리하기 위해 만듬.
    function is_space_name($space_name){
        return in_array($space_name,$this->valid_drivers);
    }

    // timestamp로 두 시간 값을 받아서 앞 뒤가 맞는지 체크
    function is_ordered($time_from, $time_to) {
        $time_from = $this->toStamp($time_from);
        $time_to = $this->toStamp($time_to);
        return ($time_from < $time_to) ? TRUE : FALSE;
    }

    // 최대 예약 가능시간에서 이미 예약한 시간을 뺀 값($max_duration)과 비교
    function is_shorter($time_from, $time_to, $max_duration) {
        $from = $this->toStamp($time_from);
        $to = $this->toStamp($time_to);
        return ($to - $from <= $max_duration) ? TRUE : FALSE;
    }

    // 예약 가능 기간 시작에 걸리는지 확인
    function is_valid_start_time($time_from, $time_to, $max_day_start){
        $from = $this->toStamp($time_from);
        $to = $this->toStamp($time_to);

        $now = time();
        $date_from = date('Y-m-d', $from).' 00:00';
        $date_from = date_create_from_format('Y-m-d H:i', $date_from)->getTimestamp();
        $date_diff = ceil(($date_from - $now)/(60*60*24));

        return (
            ($date_diff > $max_day_start)
            || (($date_diff == $max_day_start))
        ) ? TRUE : FALSE;
    }

    // 예약 가능 기간 끝에 걸리는지 확인
    function is_valid_end_time($time_from, $time_to, $max_day_end){
        $from = $this->toStamp($time_from);
        $to = $this->toStamp($time_to);

        $now = time();
        $date_to = date('Y-m-d', $to).' 00:00';
        $date_to = date_create_from_format('Y-m-d H:i', $date_to)->getTimestamp();
        $date_diff = ceil(($date_to - $now)/(60*60*24));

        return (
            ($date_diff < $max_day_end)
            || (($date_diff == $max_day_end))
        ) ? TRUE : FALSE;
    }

    // 이틀에 걸친 예약을 ~자정 과 자정~ 로 나눕니다.
    function splitTime($time_from, $time_to){
        $from_date = date('Y-m-d', $this->toStamp($time_from));
        $to_date = date('Y-m-d', $this->toStamp($time_to));

        return  ($from_date == $to_date)
            ? array($from_date)
            : array($from_date, $to_date);
    }

    // 그 사람이 오늘 이미 예약한 시간의 길이를 timestamp로 반환합니다.
    function time_used($space, $day){
        // 날짜가 넘어가는 예약도 시간에 포함시키기 위해서 그저께부터 이틀후까지 예약을 계산함.
        $start_timestamp = $this->toStamp($day);
        $start = date('Y-m-d', $start_timestamp).' 00:00:00';
        $end_timestamp = $start_timestamp + 60*60*24;
        $end = date('Y-m-d', $end_timestamp).' 00:00:00';

        $query = "SELECT `time_from`, `time_to` FROM `reservation` WHERE `space` = ? AND `reserver_id` = ? AND `time_to` > ? AND `time_from` < ? AND `state` = 'grant'";
        $revs = $this->ci->db->query($query, array($space, $_SESSION['student_id'], $start, $end))->result();

        // echo $this->ci->db->last_query().'<br>';
        // print_r($revs);
        // echo '<br>';

        $duration = 0;
        foreach ($revs as $res){
            $from = $res->time_from;
            $to = $res->time_to;
            $days_covered = $this->splitTime($from, $to);
            if (count($days_covered) == 1){ // 하루에만 걸쳐있는 예약
                if ($day == $days_covered[0]){

                    $duration += $this->toStamp($to) - $this->toStamp($from);

                }
            } elseif ($days_covered[0] == $day){ // 계산하려는 날짜의 저녁에 걸쳐있는 예약

                $duration += $this->toStamp($day) + 60*60*24 - $this->toStamp($from);

            } elseif ($days_covered[1] == $day){ // 계산하려는 날짜의 새벽에 걸쳐있는 예약

                $duration += $this->toStamp($to) - $this->toStamp($day);

            } else {}
        }

        return $duration;
    }
}
