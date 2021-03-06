<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Balance;
use App\Models\Historic;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    # Cria o relacionamento entre Users & Balances 1 pra 1
    public function balance()
    {
        return $this->hasOne(Balance::class);
    }

    # Cria o relacionamento entre Users & Historics 1 para muitos  1 pra n
    public function Historics()
    {
        return $this->hasMany(Historic::class);
    }

    public function getSender($sender)
    {
        return $this->where('name', 'LIKE', "%$sender%")
                ->orWhere('email', $sender)
                ->get()
                ->first();
    }

}
