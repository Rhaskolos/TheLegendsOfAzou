<?php
namespace model;

interface ICRUD {
    public static function create(array $data): ICRUD;
    public static function read(int $id): ICRUD;
    public function update(ICRUD $dao): bool;
    public function delete(ICRUD $dao): bool;
}
