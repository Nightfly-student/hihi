<?php 
namespace Services;

use Repositories\NewsRepository;

class NewsService {
    public function insertEmail($email) {
        $repository = new NewsRepository();
        $repository->insertEmail($email);
    }
}
