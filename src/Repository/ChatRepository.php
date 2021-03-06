<?php
namespace App\Repository;

use App\Database\ConnectionHandler;
use Exception;

class ChatRepository extends Repository
{
    protected $tableName = "chat";
    public function create($message, $author)
    {



        $query = "INSERT Into {$this->tableName} (author, message) VALUES (?,?)";
        $connection = ConnectionHandler::getConnection();
        $statement = $connection->prepare($query);
        $statement->bind_param("ss", $author,$message);
        if ($statement == false) {
            throw new Exception($connection->error);
        }
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }



}
