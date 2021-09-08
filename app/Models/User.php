<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Bavix\Wallet\Interfaces\Confirmable;
use Bavix\Wallet\Interfaces\Wallet;
use Bavix\Wallet\Traits\CanConfirm;
use Bavix\Wallet\Traits\HasWallet;
use Bavix\Wallet\Traits\HasWalletFloat;
use Bavix\Wallet\Interfaces\WalletFloat;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements Wallet, Confirmable, WalletFloat
{
    use HasFactory, Notifiable;
    use HasWallet, CanConfirm;
    use HasWalletFloat;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'roles_name',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'roles_name' => 'array',
    ];



    public function merchant()
    {
        return $this->hasOne(Merchant::class);
    }

    public function isMerchant()
    {
        if (isset($this->merchant->active)) {

            return $this->merchant->active == 1 ? true : false;

        }
        return false;
    }
 

    public function orders()
    {
        return $this->hasMany(Order::class, 'email');
    }
}
