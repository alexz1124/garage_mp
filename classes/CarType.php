<?php
class Cartype
{
    private $db;
    public $C_id,
        $C_brand,
        $C_model,
        $C_color,
        $C_license,
        $C_size,
        $M_id;

    function __construct($conn)
    {
        $this->db = $conn;
        // $this->Select_member();
    }

    // public function Select_all_member()
    // {
    //     $members = mysqli_query($this->db, "SELECT * FROM register");
    //     return $members;
    // }

    // public function Select_member($id)
    // {
    //     $member = mysqli_query($this->db, "SELECT `r_username`, `r_name`, `r_phone`, `r_status` FROM `register` WHERE `id`= $id");
    //     return $member;
    // }

    // public function Update_member($__id, $username, $name, $password, $re_password, $phone, $permisstion)
    // {
    //     echo $__id, $username, $name, $password, $re_password, $phone, $permisstion;

    //     $sql = "UPDATE `register` SET `r_username`='$username',`r_name`='$name',`r_phone`='$phone',`r_status`='$permisstion' WHERE id = $__id";
    //     $result = mysqli_query($this->db, $sql);
    //     return $result;
    // }

    // function Delete_member($__id)
    // {
    //     $sql = "DELETE FROM `register` WHERE id = '$__id'";
    //     $result = mysqli_query($this->db, $sql);
    //     return $result;
    // }



    public function Register_Car($brand, $model, $color, $license, $size,$id)
    {

        $this->C_brand = $brand;
        $this->C_model = $model;
        $this->C_color = $color;
        $this->C_license = $license;
        $this->C_size = $size;
        $this->M_id = $id;
        

        $reg = mysqli_query($this->db, "INSERT INTO cartype (`C_brand`, `C_model`, `C_size`, `C_color`, `C_license`, `M_id`) 
        VALUES ('$this->C_brand','$this->C_model','$this->C_size','$this->C_color','$this->C_license','$this->M_id')");
        return $reg;
    }
}
