<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $table = "transactions";
    protected $guarded = [];

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->translatedFormat('l, d/m/Y');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->translatedFormat('l, d/m/Y');
    }

    public function customer()
    {
        return $this->belongsTo(User::class);
    }

    public function employe()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function clothes()
    {
        return $this->hasMany(Clothes::class);
    }
}
