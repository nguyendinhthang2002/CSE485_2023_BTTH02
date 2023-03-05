<?php
include("configs/DBConnection.php");
include("models/Category.php");
class CategoryService{
    public function getAllCategorys(){
        // 4 bước thực hiện
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        // B2. Truy vấn
        $sql = "SELECT * FROM theloai";
        $stmt = $conn->query($sql);

        // B3. Xử lý kết quả
        $Categorys = [];
        while($row = $stmt->fetch()){
            $Category = new Category($row['ma_tloai'], $row['ten_tloai']);
            array_push($Categorys,$Category);
        }
        // Mảng (danh sách) các đối tượng Category Model
        return $Categorys;
    }
    public function addCategory($ten_tloai)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        $sql = "INSERT INTO theloai (ten_tloai) VALUES('$ten_tloai')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->rowCount();
        if($result > 0){
            return true;
        }
        else{
            return false;
        }
    }
    public function deleteCategory($ma_tloai)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        $sql = "DELETE FROM theloai WHERE ma_tloai = $ma_tloai";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->rowCount();
        if($result > 0){
            return true;
        }
        else{
            return false;
        }
    }
    public function getCategoryById($ma_tloai)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        $sql = "SELECT * FROM theloai WHERE ma_tloai = $ma_tloai";
        $stmt = $conn->query($sql);
        $row = $stmt->fetch();
        $Category = new Category($row['ma_tloai'], $row['ten_tloai']);
        return $Category;
    }
    public function updateCategory($category)
    {
            $dbConn = new DBConnection();
            $conn = $dbConn->getConnection();
            $ten_tloai = $category->getten_tloai(); // sử dụng getter để truy cập vào giá trị thuộc tính $ten_tloai
            $ma_tloai = $category->getma_tloai();
            $sql = "UPDATE theloai SET ten_tloai = '$ten_tloai' WHERE ma_tloai = $ma_tloai";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->rowCount();
        if($result > 0){
            return true;
        }
        else{
            return false;
        }
    }
}
?>