<?php
namespace model;

interface ICRUD {
    public static function create(array $data);
    public static function read(int $id);
    public function update($dao): bool;
    public function delete($dao): bool;
}
