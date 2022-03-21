<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password', 'type', 'phone', 'RC', 'NIF', 'NIS', 'AI'];

    public function Products()
    {
        return $this->hasMany(Product::class);
    }

    public function Stocks()
    {
        return $this->hasMany(Stock::class);
    }

    public function Livreurs()
    {
        return $this->hasMany(Livreur::class);

    }
}
