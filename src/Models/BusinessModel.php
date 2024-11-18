<?php

require_once 'src/Entities/BusinessEntity.php';

class BusinessModel {
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * @return BusinessEntity[]
     */
    public function getAll(): array
    {
        $query = $this->db->prepare('SELECT `businesses`.`id`, `name`, `description`, `founded`, `type` 
            FROM `businesses` 
                INNER JOIN `types` 
                    ON `businesses`.`type_id` = `types`.`id`;');
        $query->setFetchMode(PDO::FETCH_CLASS, BusinessEntity::class);
        $query->execute();
        return $query->fetchAll();
    }

    public function getById(int $id): BusinessEntity|false
    {
        $query = $this->db->prepare('SELECT `businesses`.`id`, `name`, `description`, `founded`, `type` 
            FROM `businesses` 
                INNER JOIN `types` 
                    ON `businesses`.`type_id` = `types`.`id`
            WHERE `businesses`.`id` = :id;');
        $query->setFetchMode(PDO::FETCH_CLASS, BusinessEntity::class);
        $query->execute(['id' => $id]);
        return $query->fetch();
    }

    public function create(string $name, string $description, string $founded, int $typeId): bool
    {
        $query = $this->db->prepare('INSERT INTO `businesses` (`name`, `description`, `founded`, `type_id`) VALUES (:name, :description, :founded, :typeId);');
        return $query->execute([
            'name' => $name,
            'description' => $description,
            'founded' => $founded,
            'typeId' => $typeId
        ]);
    }

    public function update(int $id, string $name, string $description, string $founded, int $typeId): bool
    {
        $query = $this->db->prepare('UPDATE `businesses` SET `name` = :name, `description` = :description, `founded` = :founded, `type_id` = :typeId WHERE `id` = :id');
        return $query->execute([
            'id' => $id,
            'name' => $name,
            'description' => $description,
            'founded' => $founded,
            'typeId' => $typeId
        ]);
    }
}