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
    }

    public function Select_all_car()
    {
        $members = mysqli_query($this->db, "SELECT * FROM `cartype` WHERE C_delete != 1");
        return $members;
    }

    public function Register_Car($brand, $model, $color, $license, $size, $id)
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

    public function Register_Car_Workin($brand, $model, $color, $license, $size, $name)
    {

        $this->C_brand = $brand;
        $this->C_model = $model;
        $this->C_color = $color;
        $this->C_license = $license;
        $this->C_size = $size;

        $reg = mysqli_query($this->db, "INSERT INTO cartype (`C_brand`, `C_model`, `C_size`, `C_color`, `C_license`, `WORKIN_name`) 
        VALUES ('$this->C_brand','$this->C_model','$this->C_size','$this->C_color','$this->C_license','$name')");
        return $reg;
    }

    public function Select_car($id)
    {
        $car = mysqli_query($this->db, "SELECT * FROM `cartype` WHERE `C_id`= $id");
        return $car;
    }

    public function Select_car_By_Mid($M_id)
    {
        $car = mysqli_query($this->db, "SELECT * FROM `cartype` WHERE `M_id`= $M_id and C_delete != 1");
        return $car;
    }

    public function Update_car($__id, $brand, $model, $color, $size, $license)
    {
        $sql = "UPDATE `cartype` SET `C_brand`='$brand',`C_model`='$model',`C_size`='$size',`C_color`='$color',`C_license`='$license' where C_id = $__id";
        $result = mysqli_query($this->db, $sql);
        return $result;
    }

    function Delete_car($__id)
    {
        $sql = "UPDATE `cartype` SET `C_delete` = '1' WHERE `C_id` = '$__id'";
        $result = mysqli_query($this->db, $sql);
        return $result;
    }
}
