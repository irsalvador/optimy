<?php

include_once('BaseRepository.php');

/**
 * NewsRepository class
 * @modified Ishmael Salvador <irsalvador06@gmail.com>
 * @since 2024.03.14
 **/
class NewsRepository extends BaseRepository
{
    public function __construct(DB $db)
    {
        parent::__construct($db);
        require_once(ROOT . '/class/News.php');
    }

    public function listNews()
    {
        $sql = 'SELECT * FROM `news`';
        $sth = $this->db->getPdo()->query($sql);
        $rows = $sth->fetchAll();

        $news = [];
        foreach ($rows as $row) {
            $n = new News();
            $news[] = $n->setId($row['id'])
                ->setTitle($row['title'])
                ->setBody($row['body'])
                ->setCreatedAt($row['created_at']);
        }

        return $news;
    }

    public function addNews($title, $body)
    {
        $sql = "INSERT INTO `news` (`title`, `body`, `created_at`) VALUES(?, ?, ?)";
        $stmt = $this->db->getPdo()->prepare($sql);
        $stmt->execute([$title, $body, date('Y-m-d')]);
        return $this->db->getPdo()->lastInsertId();
    }

    public function deleteNews($id)
    {
        $commentRepository = new CommentRepository($this->db);
        $comments = $commentRepository->listCommentsByNewsId($id);

        foreach ($comments as $comment) {
            $commentRepository->deleteComment($comment->getId());
        }

        $sql = "DELETE FROM `news` WHERE `id` = ?";
        $stmt = $this->db->getPdo()->prepare($sql);
        return $stmt->execute([$id]);
    }
}