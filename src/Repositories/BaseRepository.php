<?php

namespace App\Repositories;

use App\Database\DB;

class BaseRepository extends DB
{
    protected string $tableName;

    // public function create(array $data): ?int
    // {
    //     $sql = "INSERT INTO `%s` (%s) VALUES (%s)";
    //     $fields = '';
    //     $values = '';
    //     // foreach ( )
    //     // {

    //     // }
    // }


    public function select()
    {
        return "SELECT * FROM `{$this->tableName}` ";
    }


    public function getAll(): array
    {
        $query = $this->select();

        // ". ORDER BY name";
        return $this->mysqli->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    public function getById(int $id): array
    {
        $query = $this->select() . " WHERE id=$id";

        $result = $this->mysqli->query($query)->fetch_assoc();
        if (!$result) {
            $result = [];
        }

        return $result;
    }

    function deleteById($id)
    {
        return $this->mysqli->query("DELETE FROM `{$this->tableName}` WHERE id=$id");
    }




    // public function countAll()
    // {

    // }

    // public function getCount()
    // {

    // }


}
