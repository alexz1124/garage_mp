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
        // $this->Select_member();
    }

    public function Select_all_member()
    {
        $members = mysqli_query($this->db, "SELECT * FROM register WHERE `M_delete` != 1");
        return $members;
    }

    public function Select_member($id)
    {
        $member = mysqli_query($this->db, "SELECT `r_username`, `r_name`, `r_phone`, `r_status` FROM `register` WHERE `id`= $id");
        return $member;
    }

    public function Select_member_user()
    {
        $users = mysqli_query($this->db, "SELECT `id`,`r_name` FROM `register` WHERE `r_status`= \"User\" and `M_delete` != 1");
        return $users;
    }

    public function Update_member($__id, $username, $name, $password, $re_password, $phone, $permisstion)
    {
        if ($password != "" && $re_password != "") {
            $sql = "UPDATE `register` SET `r_username`='$username',`r_name`='$name',`r_password`='$password',`r_confirmpassword`='$re_password',`r_phone`='$phone',`r_status`='$permisstion' WHERE id = $__id";
            $result = mysqli_query($this->db, $sql);
        } else {
            $sql = "UPDATE `register` SET `r_username`='$username',`r_name`='$name',`r_phone`='$phone',`r_status`='$permisstion' WHERE id = $__id";
            $result = mysqli_query($this->db, $sql);
        }

        return $result;
    }

    function Delete_member($__id)
    {
        $sql = "UPDATE `register` SET `M_delete` = '1' WHERE `register`.`id` = '$__id'";
        $result = mysqli_query($this->db, $sql);
        return $result;
    }
}
