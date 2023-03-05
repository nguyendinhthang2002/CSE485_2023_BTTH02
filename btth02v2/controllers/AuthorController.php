<?php
include 'services/AuthorService.php';
class AuthorController
{
    public function index()
    {
        $authorService = new AuthorService();
        $authors = $authorService->getAllAuthor();
        include 'views/author/list_author.php';
    }

    public function addAuthorController()
    {
        $authorService = new AuthorService();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['txtAutId'];
            $name = $_POST['txtAutName'];
            $avt = $_POST['txtAutAvt'];
            if (!empty($id) && !empty($name) && !empty($avt)) {
                $result = $authorService->addAuthor($id, $name, $avt);
                if ($result) {
                    header('location:index.php');
                } else {
                    echo 'error';
                }
            }
        }
        include 'views/author/add_author.php';
    }

    public function editAuthorController()
    {
        $authorService = new AuthorService();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        $author = $authorService->findAuthorId($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['txtAutId'];
            $name = $_POST['txtAutName'];
            $avt = $_POST['txtAutAvt'];
            if (!empty($name) && !empty($avt)) {
                $result = $authorService->editAuthor($id, $name, $avt);
                if ($result) {
                    header('location:index.php');
                } else {
                    echo 'error';
                }
            }
        }
        include 'views/author/edit_author.php';
    }

    public function deleteAuthorController()
    {
        $authorService = new AuthorService();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        $author = $authorService->findAuthorId($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $result = $authorService->deleteAuthor($_GET['id']);
            if ($result) {
                header('location:index.php');
            } else {
                echo 'error';
            }
        }
        include 'views/author/delete_author.php';
    }
}
