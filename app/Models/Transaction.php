<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{

    use HasFactory, SoftDeletes;
    protected $table = 'transactions';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $guarded = [];

    public function car()
    {
        return $this->belongsTo(Car::class, 'id_kendaraan', 'id');
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'id_driver', 'id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'id_pegawai', 'id_pegawai');
    }

    public function mine()
    {
        return $this->belongsTo(Mine::class, 'tujuan_tambang', 'id');
    }
}
