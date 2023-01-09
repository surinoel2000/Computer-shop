<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone_num',
        'diachi',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public $title = "User";

    public function listingConfigs() {
        //$defaultListtingConfigs = parent::defaultListingConfigs();

        $listingConfigs =  array(
            array(
                'field' => 'id',
                'name' => 'Mã người dùng',
                'type' => 'string'
            ),
            array(
                'field' => 'name',
                'name' => 'Tên người dùng',
                'type' => 'string'
            ),
            array(
                'field' => 'email',
                'name' => 'Email',
                'type' => 'string'
            ),
            array(
                'field' => 'phone_num',
                'name' => 'Số điện thoại',
                'type' => 'string'
            ),
            array(
                'field' => 'diachi',
                'name' => 'Địa chỉ',
                'type' => 'string'
            ),

            array(
                'field' => 'updated_at',
                'name' => 'Ngày cập nhật',
                'type' => 'string'
            ),
            array(
                'field' => 'created_at',
                'name' => 'Ngày tạo',
                'type' => 'string'
            )

        );
        return array_merge($listingConfigs);
    }
}
