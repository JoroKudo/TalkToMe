<?php

namespace App\Repository;

use App\Database\ConnectionHandler;
use Exception;
class UserRepository extends Repository
{
    protected $tableName = 'user';
    public function create($firstName, $lastName, $email, $password)
    {
        $query = "INSERT Into {$this->tableName} (firstName, lastName, email, password) VALUES ('$firstName', '$lastName', '$email', '$password');";

        $connection = ConnectionHandler::getConnection();

        $statement = $connection->prepare($query);


        if ($statement == false){
            throw new Exception($connection->error);
        }

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }

}
