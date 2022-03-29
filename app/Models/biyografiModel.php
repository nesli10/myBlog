<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class biyografiModel extends Model
{
    use HasFactory;
    protected $table = 'biyografi';
    protected $primaryKey = 'biyografiid';
    public $timestamps = false;
    protected $guarded = [];
}
