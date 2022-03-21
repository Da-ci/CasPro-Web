<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = ['numCommande', 'status', 'user_id', 'pdv_id'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function Pdv()
    {
        return $this->belongsTo(pdv::class);
    }
    public function Product()
    {
        return $this->belongsToMany(Product::class)
            ->withPivot('quantity');
    }
}
