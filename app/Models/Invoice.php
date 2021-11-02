<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Invoice extends Model
{
    use HasFactory;
    protected $table = 'invoices';

    protected $fillable = [
        'date',
        'assign_by',
        'crate',
        'delivery',
        'weight',
        'product',
        'price',
        'create_by',
        'to',
        'status',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
