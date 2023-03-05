<?php
include("services/ArticleService.php");
class ArticleController{
    // Hàm xử lý hành động index
    public function index(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $ArticleService = new ArticleService();
        $articles = $ArticleService->getAllArticles();

        include("views/article/list_article.php");
    }
    public function add()
    {
       if($_SERVER["REQUEST_METHOD"] == "POST")
       {
       
        $tieude = $_POST['txtTieuDe'];
        $ten_bhat = $_POST['txtBaiHat'];
        $ma_tloai = $_POST['txtMaTheLoai'];
        $tomtat = $_POST['txtTomTat'];
        $noidung = $_POST['txtNoiDung'];
        $ma_tgia = $_POST['txtMaTacGia'];
        $hinhanh = $_POST['imgBaiViet'];
    

            $ArticleService = new ArticleService();
            $result = $ArticleService->addArticle($tieude,  $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $hinhanh);
            if($result){
                // Thêm thành công, chuyển hướng về trang danh sách
                header("Location: index.php?controller=article&action=index");
            }
            else{
                // Thêm thất bại, hiển thị thông báo lỗi
                $error = "Thêm mới thất bại";
                include("views/article/add_article.php");
            }
       }
       else{
           // Hiển thị form thêm mới
           include("views/article/add_article.php");
       }
        
    }

    public function list(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        // echo "Tương tác với Services/Models from Article";
        // Nhiệm vụ 2: Tương tác với View
        include("views/article/list_article.php");
    }
}
?>