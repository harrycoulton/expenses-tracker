<?php


namespace Example\Models;


class UserModel
{
    private $db;

    /**
     * UserModel constructor.
     * @param $db
     */
    public function __construct($db)
    {
        $this->db = $db;
    }

    /**
     * Gets UserInfo from the database
     * @return mixed
     */
    public function getUser()
    {
        $query = $this->db->query('SELECT `id`, `username`, `budget`, `savings-target`, `savings-total` FROM  `users` ORDER BY `id`');
        $expenses = $query->fetchAll();
        return $expenses;
    }
}