<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'seller_id', 
        'name', 
        'email', 
        'commission', 
        'value'
    ];

    public function seller() {
        return $this->belongsTo(Seller::class);
    }
}
