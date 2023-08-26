<?php

namespace Core;

use Core\App;
use Core\Database;

class Validator
{
    public static function unique(string $sku): bool
    {
        $db = App::resolve(Database::class);

        $result = $db->query("SELECT * FROM products WHERE sku = :sku", [
            'sku' => $sku,
        ])->get();

        if (count($result) > 0) {
            return false;
        }

        return true;
    }
}
