<?php
include 'configs/DBConnection.php';
include 'models/Article.php';
class ArticleService
{
    public function getAllArticles()
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = 'SELECT * FROM baiviet';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $articles = [];
        while ($row = $stmt->fetch()) {
            $article = new Article($row['ma_bviet'], $row['tieude'], $row['ten_bhat'], $row['ma_tloai'], $row['tomtat'], $row['noidung'], $row['ma_tgia'], $row['ngayviet'], $row['hinhanh']);
            array_push($articles, $article);
        }
        return $articles;
    }
}