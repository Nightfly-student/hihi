<?php

namespace Repositories;

use PDO;
use PDOException;

class NewsRepository extends Repository
{
    function insertEmail($email)
    {
        try { 
            $stmt = $this->connection->prepare("INSERT INTO newsletter_subscriber (email) VALUES (:email);");
            $stmt->execute([':email' => $email]);

        } catch (PDOException $e) {
            echo $e;
        }
    }
}
