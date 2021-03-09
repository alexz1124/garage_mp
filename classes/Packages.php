<?php
class Packages
{
    private $db;
    public $P_id,
        $P_name,
        $P_price,
        $P_size;

    function __construct($conn)
    {
        $this->db = $conn;
        // $this->Select_member();
    }

    public function Add_package($name, $price, $size)
    {
        $this->P_name = $name;
        $this->P_price = $price;
        $this->P_size = $size;

        $sql = mysqli_query($this->db, "INSERT INTO packages (P_name,P_price,P_size) 
        VALUES ('$this->P_name','$this->P_price','$this->P_size')");
        return $sql;
    }

    public function Select_all_packages()
    {
        $packages = mysqli_query($this->db, "SELECT * FROM packages");
        return $packages;
    }

    public function Select_package($id)
    {
        $package = mysqli_query($this->db, "SELECT `P_name`, `P_size`, `P_price` FROM `packages` WHERE `P_id`= $id");

        return $package;
    }

    public function Select_package_size($size)
    {
        $package = mysqli_query($this->db, "SELECT `P_id`,`P_name`, `P_size`, `P_price` FROM `packages` WHERE `P_size`= '$size'");
        // var_dump($package);
        return $package;
    }

    public function Update_package($__id,$name, $price, $size)
    {
        $sql = "UPDATE `packages` SET `P_name`='$name',`P_price`='$price',`P_size`='$size' WHERE P_id = $__id";
        $result = mysqli_query($this->db, $sql);
        return $result;
    }

    function Delete_package($__id)
    {
        $sql = "DELETE FROM `packages` WHERE id = '$__id'";
        $result = mysqli_query($this->db, $sql);
        return $result;
    }
}
