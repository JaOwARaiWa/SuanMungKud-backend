<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Invoice;

class User_Invoice extends Model
{
    use HasFactory;
    protected $table = 'user_invoices';

    protected $fillable = [
        'date',
        'create_by',
        'sent_to',
        'invoice_id'
    ];

    public function create_by() {
        return $this->belongsTo(User::class, 'create_by');
    }

    public function sent_to() {
        return $this->belongsTo(User::class, 'sent_to');
    }

    public function invoice() {
        return $this->belongsTo(Invoice::class);
    }
}
