<?php

include_once('BaseRepository.php');

/**
 * CommentRepository class
 * @modified Ishmael Salvador <irsalvador06@gmail.com>
 * @since 2024.03.14
 **/
class CommentRepository extends BaseRepository
{
    public function __construct(DB $db)
    {
        parent::__construct($db);
        require_once(ROOT . '/class/Comment.php');
    }

    public function listComments()
    {
        $sql = 'SELECT * FROM `comment`';
        $sth = $this->db->getPdo()->query($sql);
        $rows = $sth->fetchAll();

        $comments = [];
        foreach ($rows as $row) {
            $c = new Comment();
            $comments[] = $c->setId($row['id'])
                ->setBody($row['body'])
                ->setCreatedAt($row['created_at'])
                ->setNewsId($row['news_id']);
        }

        return $comments;
    }

    public function listCommentsByNewsId($newsId)
    {
        $sql = 'SELECT * FROM `comment` WHERE `news_id` = ?';
        $stmt = $this->db->getPdo()->prepare($sql);
        $stmt->execute([$newsId]);
        $rows = $stmt->fetchAll();

        $comments = [];
        foreach ($rows as $row) {
            $c = new Comment();
            $comments[] = $c->setId($row['id'])
                ->setBody($row['body'])
                ->setCreatedAt($row['created_at'])
                ->setNewsId($row['news_id']);
        }

        return $comments;
    }

    public function addCommentForNews($body, $newsId)
    {
        $sql = "INSERT INTO `comment` (`body`, `created_at`, `news_id`) VALUES(?, ?, ?)";
        $stmt = $this->db->getPdo()->prepare($sql);
        $stmt->execute([$body, date('Y-m-d'), $newsId]);
        return $this->db->getPdo()->lastInsertId();
    }

    public function deleteComment($id)
    {
        $sql = "DELETE FROM `comment` WHERE `id` = ?";
        $stmt = $this->db->getPdo()->prepare($sql);
        return $stmt->execute([$id]);
    }
}