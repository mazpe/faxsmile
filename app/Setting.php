<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'entity_id', 'from_email','from_name', 'signature', 'fax_incoming', 'fax_outgoing', 'fax_status',
        'unauthorized_access', 'note'
    ];

}
