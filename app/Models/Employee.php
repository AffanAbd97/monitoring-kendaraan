<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id';
    protected $table = 'employees';
    public $incrementing = false;
    protected $guarded = [];

    public function kantor()
    {
        return $this->hasOne(Kantor::class, 'id', 'penempatan');
    }
}
