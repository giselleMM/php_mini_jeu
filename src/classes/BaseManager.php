<?php


abstract class BaseManager
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * @return PDO
     */
    public function getDb(): PDO
    {
        return $this->db;
    }

    /**
     * @param PDO $db
     */
    public function setDb(PDO $db): void
    {
        $this->db = $db;
    }


}