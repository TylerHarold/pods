<?php

namespace App\Models\Pod;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PodUser extends Model
{
    use HasFactory;

    protected $connection = "mysql";
    protected $table = "pod_users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'pod_id',
        'rank_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    /**
     * Grabs all pods the user is in
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pods() {
        return $this->hasMany('App\Models\Pod\Pod', 'id', 'pod_id');
    }

    public function user() {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
