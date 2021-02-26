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
        $members = mysqli_query($this->db, "SELECT * FROM register");
        return $members;
    }

    public function Select_member($id)
    {
        $member = mysqli_query($this->db, "SELECT `r_username`, `r_name`, `r_phone`, `r_status` FROM `register` WHERE `id`= $id");
        return $member;
    }

    public function Update_member($__id, $username, $name, $password, $re_password, $phone)
    {
        //echo $__id, $username, $name, $password, $re_password, $phone;

        $sql = "UPDATE `register` SET `r_username`='$username',`r_name`='$name',`r_phone`='$phone' WHERE id = $__id";

        echo $sql;
        $result = mysqli_query($this->db, $sql);

        echo $result;
        return $result;
    }

    function Delete_member($id)
    {
        echo $id;
        // $sql = "DELETE FROM content_db WHERE id = '$id_delete'";

        // if ($conn->query($sql) === true) {
        //     echo "Record delete successfully";
        //     header('Location: index.php');
        //     die();
        // } else {
        //     echo "Error deleting record: " . $conn->error;
        // }
    }
}
