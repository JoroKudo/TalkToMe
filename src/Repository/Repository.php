<?php
namespace App\Repository;
use App\Database\ConnectionHandler;
use Exception;

class Repository
{
    protected $tableName = null;


    public function readById($id)
    {
        $query = "SELECT * FROM {$this->tableName} WHERE id=?";
        $connection = ConnectionHandler::getConnection();
        $statement = $connection->prepare($query);
        $statement->bind_param('i', $id);
        if ($statement == false){
            throw new Exception($connection->error);
        }
        $statement->execute();
        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }
        $row = $result->fetch_object();
        $result->close();
        return $row;
    }


    public function readAll($max = 100)
    {
        $query = "SELECT * FROM {$this->tableName} LIMIT 0, $max";
        $connection = ConnectionHandler::getConnection();
        $statement = $connection->prepare($query);
        if ($statement == false){
            throw new Exception($connection->error);
        }
        $statement->execute();
        if ($statement == false){
            throw new Exception($connection->error);
        }

        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }
        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }
        return $rows;
    }
    public function deleteById($id)
    {
        $query = "DELETE FROM {$this->tableName} WHERE id=?";
        $connection = ConnectionHandler::getConnection();
        $statement = $connection->prepare($query);
        $statement->bind_param('i', $id);
        if ($statement == false){
            throw new Exception($connection->error);
        }
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }
}
