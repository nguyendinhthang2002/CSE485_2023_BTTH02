<?php
include 'services/ArticleService.php';
class HomeController
{
    public function index()
    {
        $articelService = new ArticleService();
        $articles = $articelService->getAllArticles();
        include 'views/home/home.php';
    }
}
