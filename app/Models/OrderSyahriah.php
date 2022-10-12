<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderSyahriah extends Model
{
    use HasFactory, Uuids;

    public $incrementing = false;
    protected $guarded = [];

    public function syahrias()
    {
        return $this->belongsTo(Syahriah::class, 'syahriah_id');
    }
}
