<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = "transactions";
    protected $guarded = [];
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
