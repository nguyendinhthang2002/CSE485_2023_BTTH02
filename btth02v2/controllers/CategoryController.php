<?php
include("services/CategoryService.php");
class CategoryController{
    // Hàm xử lý hành động index
    public function index(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $categoryService = new CategoryService();
        $categories = $categoryService->getAllCategorys();
        // Nhiệm vụ 2: Tương tác với View
        include("views/category/list_category.php");
        
    }
    public function add()
    {
       if($_SERVER["REQUEST_METHOD"] == "POST")
       {
            $name = $_POST["txtCatName"];
            $category = new Category(null,$name);

            $categoryService = new CategoryService();
            $result = $categoryService->addCategory($name);
            if($result){
                // Thêm thành công, chuyển hướng về trang danh sách
                header("Location: index.php?controller=category&action=index");
            }
            else{
                // Thêm thất bại, hiển thị thông báo lỗi
                $error = "Thêm mới thất bại";
                include("views/category/add_category.php");
            }
       }
       else{
           // Hiển thị form thêm mới
           include("views/category/add_category.php");
       }
        
    }
    public function del()
    {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $categoryService = new CategoryService();
            $result = $categoryService->deleteCategory($id);
            if($result){
                // Xóa thành công, chuyển hướng về trang danh sách
                header("Location: index.php?controller=category&action=index");
            }
            else{
                // Xóa thất bại, hiển thị thông báo lỗi
                $error = "Xóa thất bại";
                include("views/category/list_category.php");
            }
        } else {
            // Hiển thị thông báo lỗi nếu không có id được truyền vào
            $error = "Không tìm thấy id";
            include("views/category/list_category.php");
        }
    }
    public function edit()
    {
        if(isset($_GET["id"]))
        {
            $id = $_GET["id"];
            $categoryService = new CategoryService();
            $category = $categoryService->getCategoryById($id);
            if($category){
                include("views/category/edit_category.php");
            }
            else{
                // Không tìm thấy bản ghi, hiển thị thông báo lỗi
                $error = "Không tìm thấy bản ghi";
                include("views/category/error.php");
            }
        }
        else{
            // Chuyển hướng về trang danh sách nếu không có id được truyền vào
            header("Location: index.php?controller=category&action=index");
        }
    }
    public function update()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $id = $_POST["txtCatId"];
            $name = $_POST["txtCatNameup"];
            $category = new Category($id, $name);

            $categoryService = new CategoryService();
            $result = $categoryService->updateCategory($category);
            if($result){
                // Cập nhật thành công, chuyển hướng về trang danh sách
                header("Location: index.php?controller=category&action=index");
            }
            else{
                // Cập nhật thất bại, hiển thị thông báo lỗi
                $error = "Cập nhật thất bại";
                include("views/category/edit_category.php");
            }
        }
        else{
            // Hiển thị form sửa thông tin
            $id = $_GET["id"];
            $categoryService = new CategoryService();
            $category = $categoryService->getCategoryById($id);
            include("views/category/edit_category.php");
        }
    }
    public function list(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        // echo "Tương tác với Services/Models from Category";
        // Nhiệm vụ 2: Tương tác với View
        include("views/category/list_category.php");
    }
}
?>