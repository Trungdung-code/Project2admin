<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    use HasFactory;

    protected $table = 'student';

    protected $fillable = ["name","email","password","gender","dob","idClass"];

    protected $primaryKey = 'idStudent';
    public $timestamps = false;
}
