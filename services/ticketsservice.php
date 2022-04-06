<?php 
namespace Services;

use Repositories\TicketsRepository;

class TicketsService {
    public function getAll() {
        $repository = new TicketsRepository();
        return $repository->getAll();
    }
    public function getCart($arr) {
        $repository = new TicketsRepository();
        return $repository->getCart($arr);
    }
    public function checkTickets($arr) {
        $repository = new TicketsRepository();
        return $repository->checkTickets($arr);
    }
    public function getEvent($event_id) {
        $repository = new TicketsRepository();
        return $repository->getEvent($event_id);
    }
    public function updateAmountAvailable($tickets) {
        $repository = new TicketsRepository();
        return $repository->updateAmountAvailable($tickets);
    }
}

