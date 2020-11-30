<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use SoftDeletes;
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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(RoleModel::class, 'user_role', 'user_id', 'role_id')->withTimestamps();
    }

    public function checkPermissionAccess($checkpermission)
    {
        //lấy quyền user
        $roles = auth()->user()->roles;
        //lấy ra các quyền
        foreach ($roles as $role) {
            $permission = $role->permissions;
            if ($permission->contains('key_code', $checkpermission)) {
                return true;
            }
        }
        return false;


        //B1:lấy tất cả quyền đang login hệ thống
        //B2:so sánh giá trị đưa vào của router hiện tại xem có tồn tại các quyền mình lấy ra được không

    }
}
