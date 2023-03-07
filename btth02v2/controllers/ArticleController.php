<?php
include 'services/ArticleService.php';
class ArticleController
{
    // Hàm xử lý hành động index
    public function index()
    {
        $articleService = new ArticleService();
        $articles = $articleService->getAllArticles();
        include 'views/article/list_article.php';
    }
}
