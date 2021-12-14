<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade2Model extends Model
{
    use HasFactory;

    protected $table = 'grades';
    protected $primaryKey = 'idStudent';
    protected $fillable = ["idStudent","idSub","Skill2","Final2"];
    public $timestamps = false;
}
