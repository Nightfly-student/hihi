<?php 
namespace Services;

use Repositories\DocumentsRepository;

class DocumentService {
    public function createPDF($tickets) {
        $repository = new DocumentsRepository();
        return $repository->createPDF($tickets);
    }
    public function createInvoice($tickets) {
        $repository = new DocumentsRepository();
        return $repository->createInvoice($tickets);
    }
    public function sendOrder($tickets) {
        $repository = new DocumentsRepository();
        return $repository->sendOrder($tickets);
    }
}