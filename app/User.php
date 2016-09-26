<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Hash;


class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id', 'fax_id', 'name', 'email', 'password', 'note'
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
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     *  Set hashed password
     *
     * @param $value
     */
    public function setPasswordAttribute($value) {
        $this->attributes['password'] = Hash::make($value);
    }

    /**
     *  Set hashed password
     *
     * @param $value
     */
    public function setFaxIdAttribute($value) {
        if ($value) {
            $this->attributes['fax_id'] = $value;
        } else {
            $this->attributes['fax_id'] = null;
        }
    }


    /**
     * Get the client that owns the user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client() {
        return $this->belongsTo('App\Client');
    }

    /**
     * Get the fax that is attached to the user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fax() {
        return $this->belongsTo('App\Fax');
    }
}
