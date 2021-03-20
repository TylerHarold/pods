<?php

namespace App\Models\Pod;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pod extends Model
{
    use HasFactory;

    protected $connection = "mysql";
    protected $table = "pods";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'creator_id',
        'short_description',
        'long_description',
        'avatar'
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
        'avatar' => null
    ];

    /**
     * Grabs all pod's posts
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts() {
        return $this->hasMany('App\Models\Pod\PodPost', 'pod_id', 'id');
    }

    /**
     * Grabs all pod's ranks
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ranks() {
        return $this->hasMany('App\Models\Pod\PodRank', 'pod_id', 'id');
    }

    /**
     * Grabs the creator of the pod
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator() {
        return $this->belongsTo(User::class);
    }
}
