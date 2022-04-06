<?php 
namespace Services;

use Repositories\HistoricRepository;

class HistoricService {
    public function getAll() {
        $repository = new HistoricRepository();
        return $repository->getAll();
    }
}
