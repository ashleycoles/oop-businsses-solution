<?php

require_once 'src/Entities/TypeEntity.php';

class TypesModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * @return TypeEntity[]
     */
    public function getAll(): array
    {
        $query = $this->db->prepare('SELECT `id`, `type` FROM `types`;');
        $query->setFetchMode(PDO::FETCH_CLASS, TypeEntity::class);
        $query->execute();
        return $query->fetchAll();
    }

    public function create(string $type): bool
    {
        $query = $this->db->prepare('INSERT INTO `types` (`type`) VALUES (:type);');
        return $query->execute(['type' => $type]);
    }
}