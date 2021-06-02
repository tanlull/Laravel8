<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = 'departments';
    // protected $primaryKey = 'd_id'; // in case pk is another name other than identify
    // protected $keyType = 'string'; // in case primary is varchar (not bigint)
    // public $incrementing = false; // pk is not auto_increment
    // public $timestamps = false; // not cloumn created_at / updated_at in the table 
}
