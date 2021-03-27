<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Support\Facades\DB;

// Table
// ID
// Username
// Email
// Password
// Avatar
// Administrator - Bool
// Joined_Pods - JSON (Text)

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $connection = "mysql";
    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'avatar', 'administrator'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'administrator',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $attributes = [
        'joined_pods' => null,
        'avatar' => null,
        'administrator' => false
    ];

    /**
     * Grabs all user's posts
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts() {
        return $this->hasMany('App\Models\Pod\PodPost', 'author_id', 'id');
    }

    /**
     * Grabs all user's comments
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments() {
        return $this->hasMany('App\Models\Pod\PostComment', 'author_id', 'id');
    }

    /**
     * Grabs all user's likes
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function likes() {
        return $this->hasMany('App\Models\Pod\PostLike', 'user_id', 'id');
    }

    /**
     * Grabs all user's information in pods
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function podUser() {
        return $this->hasMany('App\Models\Pod\PodUser', 'user_id', 'id');
    }

    public function pods() {
        $user_of = DB::table('pod_users')->where('user_id', $this->id)->get();
        $user_of_ids = array();

        foreach ($user_of as $u) {
            array_push($user_of_ids, $u->pod_id);
        }

        return DB::table('pods')->whereIn('id', $user_of_ids)->get();
    }
}
