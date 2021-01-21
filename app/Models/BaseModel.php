<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * Class BaseModel
 * @package App\Models
 * @property User creator
 * @property User updater
 */
class BaseModel extends Model
{

    protected $hidden = [
        'created_at', 'created_by', 'updated_at', 'updated_by'
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

    public function getStatusHtmlAttribute() {
        switch ($this->status) {
            case 0:
                return "<span class='text text-warning'>Inactive</span>";
                break;
            case 1:
                return "<span class='text text-success'>Active</span>";
            default:
                return "<span class='text text-danger'>Unknown</span>";
        }
    }

    public function creator() {
        return $this->belongsTo(User::class, "created_by");
    }

    public function updater() {
        return $this->belongsTo(User::class, "updated_by");
    }
}