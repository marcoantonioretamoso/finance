<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioAccount extends Model
{
    protected $table = 'user_account';

    protected $fillable = [
        'user_id',
        'account_id',
        'status',
    ];

    const ACTIVO = 0;
    const INACTIVO = 1;
    public function account(){
        return $this->belongsTo(Account::class,'account_id','id')->where('status',self::ACTIVO);
    }
}