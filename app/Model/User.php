<?php

namespace App\Model;

// use App\Model\Useradress;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tymon\JWTAuth\Contracts\JWTSubject;

use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    use HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'company_name',
        'mobile_no',
        'whatsapp_no',
        'address',
        'email',
        'role',
        'seller_id',
        'requested_seller_id',
        'discount',
        'commission',
        'account_balance',
        'user_status',
        'email_verified_at',
        'password'
    ];

    public function User()
    {
        $this->belongsTo(Cart::class, 'id', 'created_by');
    }

    // protected $guard_name = 'api';
    protected $guard_name = 'web';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
