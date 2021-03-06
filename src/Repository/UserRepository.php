<?php

namespace App\Repository;

use App\Database\ConnectionHandler;
use Exception;

class UserRepository extends Repository
{
    protected $tableName = "user";
    public function existsUser($username, $password)
    {
        $query = "SELECT * FROM {$this->tableName} WHERE username=? and password=?";
        // Datenbankverbindung anfordern und, das Query "preparen" (vorbereiten)
        // und die Parameter "binden"
        $connection = ConnectionHandler::getConnection();
        $statement = $connection->prepare($query);
        if ($statement == false) {
            throw new Exception($connection->error);
        }
        $statement->bind_param('ss', $username, $password);


        // Das Statement absetzen
        $statement->execute();
        // Resultat der Abfrage holen
        $result = $statement->get_result();
        $doesUserExits = $result->num_rows != 0;
        return $doesUserExits;
    }

    public function create($username,  $email, $hashedPassword)
    {
        $query = "INSERT Into {$this->tableName} (username, email, password) VALUES (?,?,?)";
        $connection = ConnectionHandler::getConnection();
        $statement = $connection->prepare($query);
        $statement->bind_param("sss", $username,$email,$hashedPassword);


        if ($statement == false) {
            throw new Exception($connection->error);
        }
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }

    public function readByUserName($username)
    {
        // Query erstellen
        $query = "SELECT * FROM {$this->tableName} WHERE username=?";
        // Datenbankverbindung anfordern und, das Query "preparen" (vorbereiten)
        // und die Parameter "binden"
        $connection = ConnectionHandler::getConnection();
        $statement = $connection->prepare($query);
        $statement->bind_param("s", $username);
        if ($statement == false){
            throw new Exception($connection->error);
        }
        // Das Statement absetzen
        $statement->execute();

        // Resultat der Abfrage holen
        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }
        // Ersten Datensatz aus dem Reultat holen
        $row = $result->fetch_object();
        // Datenbankressourcen wieder freigeben
        $result->close();
        // Den gefundenen Datensatz zur??ckgeben
        return $row;
    }
}
