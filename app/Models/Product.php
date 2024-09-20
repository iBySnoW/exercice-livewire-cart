<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class Product extends Model
{
    use Sushi;

    protected $rows = [
        [
            'id' => 1,
            'name' => 'Iphone 16',
            'price' => 799,
        ],
        [
            'id' => 2,
            'name' => 'Iphone 14',
            'price' => 749,

        ],
        [
            'id' => 3,
            'name' => 'MacBook Pro',
            'price' => 1869,
        ],
        [
            'id' => 4,
            'name' => 'Pomme',
            'price' => 0.49,
        ],
    ];
}
