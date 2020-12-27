<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
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

    public function following(User $user) {
        return Follow::where([
            ["follower_id", $this->id],
            ["followed_id", $user->id],
        ])->first() !== null;
    }

    public function followingList() {
        return Follow::where("follower_id", $this->id)->get();
    }

    public function follow(User $user) {
        Follow::create([
            "follower_id" => $this->id,
            "followed_id" => $user->id
        ]);
    }

    public function unfollow(User $user) {
        Follow::where([
            ["follower_id", $this->id],
            ["followed_id", $user->id],
        ])->limit(1)->delete();
    }

    public function tweets() {
        return $this->hasMany(Tweet::class);
    }
}
