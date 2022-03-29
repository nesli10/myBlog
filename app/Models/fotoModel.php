<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fotoModel extends Model
{
    use HasFactory;
    protected $table = 'foto';
    protected $primaryKey = 'fotoid';
    public $timestamps = false;
    protected $guarded = [];
}
