<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class HobbyEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at'];
    protected $casts   = [];
}
