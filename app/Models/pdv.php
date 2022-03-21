<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pdv extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone', 'email', 'wilaya', 'commune', 'adresse', 'ndce', 'RC', 'NIF', 'NIS', 'AI'];

    public function Commande()
    {
        return $this->hasMany(Commande::class);
    }
}
