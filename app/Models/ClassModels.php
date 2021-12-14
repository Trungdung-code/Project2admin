<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModels extends Model
{
    use HasFactory;

    protected $table = 'classroom';
    protected $primaryKey = 'idClass';
    public $timestamps = false;
}
