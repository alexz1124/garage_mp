<?php
class Member
{
    private $db;
    public $M_id,
        $M_name,
        $M_phone,
        $M_permission;

    function __construct($conn)
    {
        $this->db = $conn;
        $this->Select_member();
    }

    public function Select_member()
    {
        $member = mysqli_query($this->db, "SELECT * FROM register");
        $this->M_name = "SSS";
        return $member;
    }
}
