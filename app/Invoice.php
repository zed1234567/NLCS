<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $guarded = [];
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    
    public function detailInvoice(){
        return $this->hasOne(InvoiceDetail::class);
    }
   
}
