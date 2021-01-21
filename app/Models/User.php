<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

/**
 * @mixin Eloquent\Builder
 **/
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $hidden = [
        'created_at', 'created_by', 'updated_at', 'updated_by', 'password', 'remember_token'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function boot() {
        parent::boot();

        static::saving(function($table)  {
            $table->created_by = Auth::user()->id;
        });

        static::updating(function($table)  {
            $table->updated_by = Auth::user()->id;
        });
    }

    public function creator() {
        return $this->belongsTo(self::class, "created_by");
    }

    public function updater() {
        return $this->belongsTo(self::class, "updated_by");
    }
}
