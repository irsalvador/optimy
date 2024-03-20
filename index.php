<?php
/**
 * @modified IR Salvador
 **/
define('ROOT', __DIR__);
require_once(ROOT . '/utils/NewsRepository.php');
require_once(ROOT . '/utils/CommentRepository.php');
require_once(ROOT . '/utils/DB.php');

$db = DB::getInstance();

$newsRepository = new NewsRepository($db);
$commentRepository = new CommentRepository($db);

foreach ($newsRepository->listNews() as $news) {
    echo nl2br("############ NEWS " . $news->getTitle() . " ############\n");
    echo($news->getBody() . "\n");
    foreach ($commentRepository->listComments() as $comment) {
        if ($comment->getNewsId() == $news->getId()) {
            echo nl2br("Comment " . $comment->getId() . " : " . $comment->getBody() . "\n");
        }
    }
}