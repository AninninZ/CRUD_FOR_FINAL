<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class crudModel extends Model
{
    use HasFactory;
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    public $incrementing = true;
    public $timestamps = false;
}
