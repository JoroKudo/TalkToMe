<?php

namespace App\Repository;

use App\Database\ConnectionHandler;
use Exception;

class UserRepository extends Repository
{
    protected $tableName = "user";

    public function existsUser($email, $password)
    {
        $query = "SELECT * FROM {$this->tableName} WHERE email=? and password=?";

        // Datenbankverbindung anfordern und, das Query "preparen" (vorbereiten)
        // und die Parameter "binden"
        $connection = ConnectionHandler::getConnection();


        $statement = $connection->prepare($query);

        if ($statement == false) {
            throw new Exception($connection->error);
        }
        $statement->bind_param('ss', $email, $password);


        // Das Statement absetzen
        $statement->execute();

        // Resultat der Abfrage holen
        $result = $statement->get_result();
        $doesUserExits = $result->num_rows != 0;

        return $doesUserExits;
    }

    public function create($firstName, $lastName, $email, $password)
    {
        $query = "INSERT Into {$this->tableName} (firstName, lastName, email, password) VALUES ('$firstName', '$lastName', '$email', '$password')";
        $connection = ConnectionHandler::getConnection();
        $statement = $connection->prepare($query);

        if ($statement == false) {
            throw new Exception($connection->error);
        }
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }


}
