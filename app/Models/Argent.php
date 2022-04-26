<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Argent extends Model
{
    use HasFactory;

    protected $fillable = ['salaireMarque', 'salaireCaspro', 'salaireCommercial', 'soldeMarque', 'soldeCommercial', 'commande_id', 'user_id'];

    public function Commande()
    {
        return $this->belongsTo(Commande::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
