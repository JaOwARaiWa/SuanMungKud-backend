<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User_Invoice;

class Invoice extends Model
{
    use HasFactory;
    protected $table = 'invoices';

    protected $fillable = [
        'date',
        'crate',
        'delivery',
        'weight',
        'product',
        'price',
        'create_by',
        'to',
        'status',
    ];

    public function user_invoices() {
        return $this->hasMany(User_Invoice::class);
    }
}
