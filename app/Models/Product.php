<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'famille', 'quantity', 'user_id'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function Stock()
    {
        return $this->belongsToMany(Stock::class)
            ->withPivot('quantity');
    }
    public function Commande()
    {
        return $this->belongsToMany(Commande::class)
            ->withPivot('quantity');
    }
}
