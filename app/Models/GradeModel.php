<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeModel extends Model
{
    use HasFactory;

    protected $table = 'grades';
    protected $primaryKey = 'idStudent';
    protected $fillable = ["idStudent","idSub","Skill1","Skill2","Final1","Final2"];
    public $timestamps = false;
}
