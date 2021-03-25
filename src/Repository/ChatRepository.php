<?php


namespace App\Repository;

use App\Database\ConnectionHandler;
use Exception;

class ChatRepository extends Repository
{







    protected $tableName = "chat";
    public function existsmsg($email, $password)
    {
        $query = "SELECT * FROM {$this->tableName} WHERE message=? ";

        // Datenbankverbindung anfordern und, das Query "preparen" (vorbereiten)
        // und die Parameter "binden"
        $connection = ConnectionHandler::getConnection();


        $statement = $connection->prepare($query);

        if ($statement == false) {
            throw new Exception($connection->error);
        }
        $statement->bind_param('s', $message);


        // Das Statement absetzen
        $statement->execute();

        // Resultat der Abfrage holen
        $result = $statement->get_result();
        $doesmsgExits = $result->num_rows != 0;

        return $doesmsgExits;
    }


    public function create($message,$author)
    {

        $query = "INSERT Into {$this->tableName} (author, message) VALUES ('$author','$message')";
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
