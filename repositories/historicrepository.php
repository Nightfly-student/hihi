<?php

namespace Repositories;

use PDO;
use PDOException;

class HistoricRepository extends Repository
{
    function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM location");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\Location');
            $locations = $stmt->fetchAll();

            return $locations;
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
