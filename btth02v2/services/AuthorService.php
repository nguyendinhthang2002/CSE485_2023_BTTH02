<?php
include 'configs/DBConnection.php';
include 'models/Author.php';
class AuthorService
{
    public function getAllAuthor()
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = 'SELECT * FROM tacgia';
        $stmt = $conn->query($sql);

        $authors = [];
        while ($row = $stmt->fetch()) {
            $author = new Author($row['ma_tgia'], $row['ten_tgia'], $row['hinh_tgia']);
            array_push($authors, $author);
        }
        return $authors;
    }

    public function findAuthorId($id)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = 'SELECT * FROM tacgia WHERE ma_tgia = :id';
        $stmt = $conn->prepare($sql);
        $stmt->bindvalue('id', $id);
        $stmt->execute();

        $row = $stmt->fetch();
        $author = new Author($row['ma_tgia'], $row['ten_tgia'], $row['hinh_tgia']);
        return $author;
    }

    public function addAuthor($author_id, $author_name, $author_avt)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        $sql = 'INSERT INTO tacgia (ma_tgia, ten_tgia, hinh_tgia) VALUES(:author_id, :author_name, :author_avt)';
        $stmt = $conn->prepare($sql);
        $stmt->bindvalue('author_id', $author_id);
        $stmt->bindvalue('author_name', $author_name);
        $stmt->bindvalue('author_avt', $author_avt);
        $result = $stmt->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function editAuthor($author_id, $author_name, $author_avt)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = 'UPDATE tacgia SET ten_tgia = :author_name, hinh_tgia = :author_avt WHERE ma_tgia = :author_id';
        $stmt = $conn->prepare($sql);
        $stmt->bindvalue('author_id', $author_id);
        $stmt->bindvalue('author_name', $author_name);
        $stmt->bindvalue('author_avt', $author_avt);
        $result = $stmt->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteAuthor($id)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = 'DELETE FROM tacgia WHERE ma_tgia = :id';
        $stmt = $conn->prepare($sql);
        $stmt->bindvalue('id', $id, PDO::PARAM_INT);
        $result = $stmt->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
