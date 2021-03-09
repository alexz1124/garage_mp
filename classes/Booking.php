<?php
class Booking
{
    private $db;
    public $B_id,
        $M_id,
        $B_date,
        $B_time,
        $B_status,
        $P_id,
        $C_id;

    function __construct($conn)
    {
        $this->db = $conn;
    }

    public function Bokking_queue($m_id, $date, $time, $c_id, $p_id, $status)
    {
        $this->M_id = $m_id;
        $this->B_date = $date;
        $this->B_time = $time;
        $this->B_status = $status;
        $this->P_id = $p_id;
        $this->C_id = $c_id;

        $reg = mysqli_query($this->db, "INSERT INTO booking (`M_id`, `B_date`, `B_time`, `B_status`, `P_id`, `C_id`) 
        VALUES (' $this->M_id','$this->B_date','$this->B_time','$this->B_status','$this->P_id','$this->C_id')");
        echo $reg;
        return $reg;
    }

    public function Select_Booking_by_date($date)
    {
        $bookings = mysqli_query($this->db, "SELECT * FROM `booking` WHERE `B_date`= \"$date\" ORDER BY B_time ASC");
        return $bookings;
    }
}
