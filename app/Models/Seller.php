<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 
        'email'
    ];

    protected $appends = [
        'total_commissions', 
        'total_sales'
    ];

    public function sales() {
        return $this->hasMany(Sale::class);
    }

    public function getTotalCommissionsAttribute()
    {
        // Usando a relação hasMany para calcular o total de comissões
        return (int) $this->sales()->sum('commission');
    }

    public function getTotalSalesAttribute()
    {
        // Usando a relação hasMany para calcular o total de vendas
        return (int) $this->sales()->sum('value');
    }
}
