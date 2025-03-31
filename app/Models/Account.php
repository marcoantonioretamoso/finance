<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Account extends Model
{
    protected $table = 'accounts';

    protected $fillable = [
        'name',
        'description',
        'amount',
        'status',
    ];
    const ACTIVO = 0;
    const INACTIVO = 1;
    public static function getCuentaDelUsuarioLogeado(){
        $user_id = Auth::user()->id;
        return self::where('status', self::ACTIVO)
            ->whereHas('usuarioAccount', function ($query) use ($user_id) {
                $query->where('user_id', $user_id);
            })->get();
    }
    public function usuarioAccount(){
         return $this->hasMany(UsuarioAccount::class, 'account_id')
            ->where('status', UsuarioAccount::ACTIVO);
    }
}