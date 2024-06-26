<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mine extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'mines';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
