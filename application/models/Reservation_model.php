<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Ask View messages translation for SCSPACE
 *
 * @author Yujin Kim <yujin.gaya@gmail.com>
 * @copyright Copyright (c) 학생문화공간위원회
 *
 */

class Reservation_model extends CI_Model {

    function get($space = NULL, $limit = NULL, $offset = 0){
        if ($space == NULL){
            $this->db->select('reservation.id, space, reserver_id, time_from, time_to, time_request, state, content, reject_reason, user.name, user.phone, user.email');
            $this->db->join('user', 'reservation.reserver_id = user.student_id');
            $this->db->order_by('state');
            $this->db->order_by("time_request", "asc");
            $this->db->where('TIMESTAMPDIFF(DAY, time_from, NOW()) < 30');
            return $this->db->get('reservation', $limit, $offset);

        } else {

            switch ($space) {

                case "piano-room":
                    $space = array('piano_room_1','piano_room_2');
                    $this->db->order_by("time_from", "desc");
                    $this->db->where_in('space',$space);
                    $reservations = $this->db->get('reservation',$limit,$offset);
                    return $reservations;
                    break;

                case "individual-practice-room":
                    $space = array('individual_practice_room_1',
                        'individual_practice_room_2',
                        'individual_practice_room_3');
                    $this->db->order_by("time_from", "desc");
                    $this->db->where_in('space',$space);
                    $reservations = $this->db->get('reservation',$limit,$offset);
                    return $reservations;
                    break;

                case "seminar-room":
                    $space = array('seminar_room_1',
                        'seminar_room_2');
                    $this->db->order_by("time_from", "desc");
                    $this->db->where_in('space',$space);

                    return $this->db->get('reservation',$limit,$offset);
                    break;
                case 'bookdabang':
                    $this->db->select('id, reserver_id, space, time_from, time_to, time_request, state, reject_reason, content');
                    $this->db->where_in('space',$space);
                    $this->db->from('reservation');
                    return $this->db->get();
                case 'ullim-hall':
                    $this->db->select('id, reserver_id, space, time_from, time_to, time_request, state, reject_reason, content');
                    $this->db->where('space','ullim_hall');
                    $this->db->from('reservation');
                    return $this->db->get();
                case 'mirae-hall':
                    $this->db->select('id, reserver_id, space, time_from, time_to, time_request, state, reject_reason, content');
                    $this->db->where('space','mirae_hall');
                    $this->db->from('reservation');
                    return $this->db->get();
                default:
                    $space = array(str_replace('-', '_', $space));
                    $this->db->order_by("time_from", "desc");
                    $this->db->where_in('space',$space);

                    return $this->db->get('reservation',$limit,$offset);
                    break;
                }



        }
    }

    function get_id($id){

        $this->db->where('reservation.id', $id);
        if ($this->db->count_all_results('reservation') == 0) show_404();

        $this->db->select('*, reservation.id AS id');
        $this->db->where('reservation.id',$id);
        $this->db->join('user', 'reservation.reserver_id = user.student_id');
        $reservation = $this->db->get('reservation')->row_array();
        return $reservation;
    }

    function get_my_reservations(){
        $this->db->where('reserver_id', $_SESSION['student_id']);
        $this->db->order_by('time_request', 'desc');
        return $this->db->get('reservation')->result_array();
    }

    function get_no_wait(){
        $this->db->where('state','wait');
        return $this->db->count_all_results('reservation');
    }

    function get_num_space() {
        return $this->db
            ->select('space, COUNT(space) AS count')
            ->group_by('space')
            ->where('state', 'grant')
            ->get('reservation')
            ->result_array();
    }

    function make(){
        date_default_timezone_set('Asia/Seoul');

        $space = $this->input->post('space', TRUE);
        $time_from = $this->input->post('time_from', TRUE);
        $time_to = $this->input->post('time_to', TRUE);
        $this->lang->load('general','korean');

        switch ($space) {
            case 'piano_room_1':
            case 'piano_room_2':
            case 'individual_practice_room_1':
            case 'individual_practice_room_2':
            case 'individual_practice_room_3':
                if ($this->validate($space, $time_from, $time_to)) {
                    $reservation = array(
                        'space' => $space,
                        'time_from' => $time_from,
                        'time_to' => $time_to,
                        'reserver_id' => $_SESSION['student_id'],
                        'time_request' => date('Y-m-d H:i:s'),
                        'time_decide' => date('Y-m-d H:i:s'),
                        'state' => 'grant'
                    );
                    $this->db->insert('reservation',$reservation);
                    $reservation_id = $this->db->insert_id();
                    $event = array(
                        'space' => $space,
                        'title' => $_SESSION['name'].'의 연습',
                        'content' => '',
                        'time_from' => $time_from,
                        'time_to' => $time_to,
                        'reservation_id' => $reservation_id,
                        'type' => 'event',
                        'state' => 'grant'
                    );
                    $this->db->insert('calendar', $event);
                }
                break;

            case 'seminar_room_1':
            case 'seminar_room_2':
            case 'multipurpose_room':
            case 'dance_studio':
                if ($this->validate($space, $time_from, $time_to)){
                    $reservation = array(
                        'space' => $space,
                        'time_from' => $time_from,
                        'time_to' => $time_to,
                        'reserver_id' => $_SESSION['student_id'],
                        'time_request' => date('Y-m-d H:i:s'),
                        'team_id' => '1'
                    );
                    $this->db->insert('reservation',$reservation);
                }
                break;

            case 'group_practice_room':
                $reservation = array(
                    'space' => $space,
                    'time_from' => $time_from,
                    'time_to' => $time_to,
                    'reserver_id' => $_SESSION['student_id'],
                    'time_request' => date('Y-m-d H:i:s'),
                    'team_id' => '1'
                );
                $this->db->insert('reservation',$reservation);
                break;
            case 'bookdabang':
                if ($this->validate($space, $time_from, $time_to)){
                    $form = array(
                        'time_from' => $time_from,
                        'time_to' => $time_to,
                        'event_name' => $this->input->post('name', TRUE),
                        'organization_name' => $this->input->post('organization_name',TRUE),
                        'purpose' => $this->input->post('purpose', TURE),
                        'content' => $this->input->post('content', TRUE),
                        'entry_in' => $this->input->post('entry', TRUE),
                        'promote' => $this->input->post('promote', TRUE),
                        'type_equipment' => $this->input->post('type_equipment', TRUE),
                        'no_table' => $this->input->post('no_table', TRUE),
                        'no_chair' => $this->input->post('no_chair', TRUE)
                    );
                    $this->db->insert('form',$form);
                    $form_id = $this->db->insert_id();
                    $reservation = array(
                        'space' => $this->input->post('space', TRUE),
                        'time_from' => $this->input->post('time_from', TRUE),
                        'time_to' => $this->input->post('time_to', TRUE),
                        'reserver_id' => $_SESSION['student_id'],
                        'time_request' => date('Y-m-d H:i:s'),
                        'form_id' => $form_id
                    );
                    $this->db->insert('reservation',$reservation);
                }
                break;
            case 'mirae_hall':
            case 'ullim_hall':
                $time_rehearsal_before_from = $this->input->post('time_rehearsal_before_from', TRUE);
                $time_rehearsal_before_to = $this->input->post('time_rehearsal_before_to', TRUE);
                $time_rehearsal_from = $this->input->post('time_rehearsal_from', TRUE);
                $time_rehearsal_to = $this->input->post('time_rehearsal_to', TRUE);
                $time_clean_up_from = $this->input->post('time_clean_up_from', TRUE);
                $time_clean_up_to = $this->input->post('time_clean_up_to', TRUE);

                $name = $this->input->post('event', TRUE);
                $food = $this->input->post('food', TRUE);

                $validity = $this->validate($space, $time_from, $time_to)
                            && $this->validate('rehearsal_before', $time_rehearsal_before_from, $time_rehearsal_before_to)
                            && $this->validate('rehearsal', $time_rehearsal_from, $time_rehearsal_to)
                            && $this->validate('clean_up', $time_clean_up_from, $time_clean_up_to);

                if ($validity){

                    $form = array(
                        'time_from' => $time_from,
                        'time_to' => $time_to,
                        'time_rehearsal_before_from' => $time_rehearsal_before_from,
                        'time_rehearsal_before_to' => $time_rehearsal_before_to,
                        'time_rehearsal_from' => $time_rehearsal_from,
                        'time_rehearsal_to' => $time_rehearsal_to,
                        'time_clean_up_from' => $this->input->post('time_clean_up_from', TRUE),
                        'time_clean_up_to' => $this->input->post('time_clean_up_to', TRUE),
                        'event_name' => $name,
                        'organization_name' => $this->input->post('organization',TRUE),
                        'purpose' => $this->input->post('purpose', TRUE),
                        'content' => $this->input->post('content', TRUE),
                        'entry_in' => $this->input->post('entry_in', TRUE),
                        'entry_out' => $this->input->post('entry_out', TRUE),
                        'type_equipment' => $this->input->post('type_equipment', TRUE),
                        'no_table' => $this->input->post('no_table', TRUE),
                        'no_chair' => $this->input->post('no_chair', TRUE),
                        'purpose_1f_lobby' => $this->input->post('purpose_1f_lobby', TRUE),
                        'bring_food' => $food,
                        'labor_time' => $this->input->post('labor_time', TRUE)
                    );

                    if (null !== $this->input->post('usage_equipment')){
                        $form['usage_equipment'] = 'yes';
                    } else {
                        $form['usage_equipment'] = 'no';
                    }
                    if (null !== $this->input->post('lock_up')){
                        $form['lock_up'] = 'yes';
                    } else {
                        $form['lock_up'] = 'no';
                    }
                    if (null !== $this->input->post('usage_1f_lobby')){
                        $form['usage_1f_lobby'] = 'yes';
                    } else {
                        $form['usage_1f_lobby'] = 'no';
                    }
                    $this->db->insert('form',$form);
                    $form_id = $this->db->insert_id();

                    if ($space == 'ullim_hall'){
                        switch ($food){
                            case 'food/drink': {$amount = 500000; break;}
                            case 'snack': {$amount = 150000; break;}
                            case 'none': {$amount = 50000; break;}
                        }
                        $deposit = array(
                            'account' => $this->input->post('deposit_account', TRUE),
                            'bank' => $this->input->post('deposit_bank', TRUE),
                            'holder' => $this->input->post('deposit_holder', TRUE),
                            'amount' => $amount,
                            'form_id' => $form_id
                        );
                        $this->db->insert('deposit',$deposit);
                    }


                    $reservation = array(
                        'space' => $this->input->post('space', TRUE),
                        'time_from' => $this->input->post('time_from', TRUE),
                        'time_to' => $this->input->post('time_to', TRUE),
                        'reserver_id' => $_SESSION['student_id'],
                        'time_request' => date('Y-m-d H:i:s'),
                        'form_id' => $form_id
                    );

                    $this->db->insert('reservation',$reservation);
                    $reservation_id = $this->db->insert_id();

                    $this->load-> model('calendar_model');
                    $this->calendar_model->make($space, $name.' 리허설', $reservation_id, $time_rehearsal_before_from, $time_rehearsal_before_to, 'rehearsal_before','wait');
                    $this->calendar_model->make($space, $name.' 당일 리허설', $reservation_id, $time_rehearsal_from, $time_rehearsal_to, 'rehearsal','wait');
                    $this->calendar_model->make($space, $name, $reservation_id, $time_from, $time_to, 'event','wait');
                    $this->calendar_model->make($space, $name.' 뒷정리', $reservation_id, $time_clean_up_from, $time_clean_up_to, 'clean_up','wait');

                }
                break;
            default:
                break;
        }
    }

    private function validate($space, $time_from, $time_to){
        $timestamp_from = date_create_from_format('Y-m-d\TH:i', $time_from)->getTimestamp();
        $timestamp_to = date_create_from_format('Y-m-d\TH:i', $time_to)->getTimestamp();
        $duration = $timestamp_to - $timestamp_from;

        $now = time();
        $date_from = date('Y-m-d', $timestamp_from);
        $timestamp_date_from = date_create_from_format('Y-m-d', $date_from)->getTimestamp();
        $date_diff = ceil(($timestamp_date_from-$now)/(60*60*24));

        if ($timestamp_from >= $timestamp_to) {
            show_error('예약 시작 시간보다 예약 끝 시간이 빠릅니다.');
            return FALSE;
        }

        switch ($space) {
            case 'piano_room_1':
            case 'piano_room_2':
            case 'individual_practice_room_1':
            case 'individual_practice_room_2':
            case 'individual_practice_room_3':
            case 'dance_studio':
            case 'multipurpose_room':
            case 'seminar_room_1':
            case 'seminar_room_2':
            case 'bookdabang':

                if (($space == 'seminar_room_1') || ($space =='seminar_room_2')){
                    $max_duration = 10800;
                } else if ($space == 'bookdabang'){
                    $max_duration = 14400;
                } else {
                    $max_duration = 7200;
                }

                if ($space == 'bookdabang'){
                    $max_day_start = 45;
                    $max_day_end = 7;
                } else {
                    $max_day_start = 14;
                    $max_day_end = 1;
                }

                if ($duration > $max_duration) {
                    show_error('예약 시간이 최대 예약 가능한 시간 이상입니다.');
                    return FALSE;
                }

                if (
                ($date_diff > $max_day_start)
                || (($date_diff == $max_day_start) && ((int) date('G',$now) < 21))
                || ($date_diff < $max_day_end)
                || (($date_diff == $max_day_end) && ((int) date('G',$now) >= 21))
                ){
                    show_error('주어진 날짜는 예약가능 기간이 아니기 때문에 예약할 수 없습니다');
                    return FALSE;
                }

                $this->db->where('space', $space);
                $this->db->where('time_from <', $time_to);
                $this->db->where('time_to >', $time_from);
                $this->db->from('reservation');
                if ($this->db->count_all_results() == 0){
                    return TRUE;
                } else {
                    show_error('시간이 겹칩니다. 신청서가 서버에 도착하는 사이에 다른 사용자가 예약했을 수도 있습니다.');
                    return FALSE;
                }
                break;
            case 'mirae_hall':
            case 'ullim_hall':

                if (null !== $this->input->post('usage_equipment')){
                    $max_day_end = 14;
                } else {
                    if ($space == 'mirae_hall'){
                        $max_day_end = 1;
                    } else {
                        $max_day_end = 3;
                    }
                }

                if (
                ($date_diff > 45)
                || (($date_diff == 45) && ((int) date('G',$now) < 21))
                || ($date_diff < $max_day_end)
                || (($date_diff == $max_day_end) && ((int) date('G',$now) >= 21))
                ){
                    show_error('주어진 날짜는 예약가능 기간이 아니기 때문에 예약할 수 없습니다');
                    return FALSE;
                }

                $this->db->where('space', $space);
                $this->db->where('time_from <', $time_to);
                $this->db->where('time_to >', $time_from);
                $this->db->from('calendar');
                if ($this->db->count_all_results() == 0){
                    return TRUE;
                } else {
                    show_error('시간이 겹칩니다. 신청서가 서버에 도착하는 사이에 다른 사용자가 예약했을 수도 있습니다.');
                    return FALSE;
                }
                break;

            case 'rehearsal_before':
                if ($duration > 7200) {
                    show_error('당일이 아니라면 리허설 시간은 2시간을 넘을 수 없습니다.');
                    return FALSE;
                }
                $this->db->where('space', $space);
                $this->db->where('time_from <', $time_to);
                $this->db->where('time_to >', $time_from);
                $this->db->from('calendar');
                if ($this->db->count_all_results() == 0){
                    return TRUE;
                } else {
                    show_error('시간이 겹칩니다. 신청서가 서버에 도착하는 사이에 다른 사용자가 예약했을 수도 있습니다.');
                    return FALSE;
                }
                break;
            case 'rehearsal':
                $this->db->where('space', $space);
                $this->db->where('time_from <', $time_to);
                $this->db->where('time_to >', $time_from);
                $this->db->from('calendar');
                if ($this->db->count_all_results() == 0){
                    return TRUE;
                } else {
                    show_error('시간이 겹칩니다. 신청서가 서버에 도착하는 사이에 다른 사용자가 예약했을 수도 있습니다.');
                    return FALSE;
                }
                break;
            case 'clean_up':
                $this->db->where('space', $space);
                $this->db->where('time_from <', $time_to);
                $this->db->where('time_to >', $time_from);
                $this->db->from('calendar');
                if ($this->db->count_all_results() == 0){
                    return TRUE;
                } else {
                    show_error('시간이 겹칩니다. 신청서가 서버에 도착하는 사이에 다른 사용자가 예약했을 수도 있습니다.');
                    return FALSE;
                }
                break;
            default:
                break;
        }



    }

    function update($id, $state, $reject_reason = NULL){
        date_default_timezone_set('Asia/Seoul');
        $time_decide = date('Y-m-d H:i:s');
        $data = array('state' => $state, 'reject_reason' => $reject_reason, 'time_decide' => $time_decide);
        $this->db->where('id', $id);
        $this->db->update('reservation', $data);

        $this->db->where('reservation_id', $id);
        $this->db->update('calendar', array('state' => $state));
    }

    function delete($id) {
        date_default_timezone_set('Asia/Seoul');
        $time_decide = date('Y-m-d H:i:s');
        $data = array('state' => 'deleted');
        $this->db->where('id', $id);
        $this->db->update('reservation', $data);

        $this->db->where('reservation_id', $id);
        $this->db->update('calendar', array('state' => 'deleted'));
    }

}

