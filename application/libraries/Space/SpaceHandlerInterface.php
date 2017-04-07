<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * SpaceHandlerInterface
 *
 * @author	Yujin Kim
 *
*/

interface SpaceHandlerInterface {

    public function make($reservation);
    public function validate($reservation);

    public function getEvent($id);
    public function getEvents();
    public function getReservation($id);
    public function getReservations();

    public function updateState($id);
    public function update($id,$data);

    public function deleteEvent($id);
    public function deleteReservation($id);

}
