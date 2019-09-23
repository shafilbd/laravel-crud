<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bio extends Model
{
    public $timestamps = false;
	protected $table = 'bio'
    protected $fillable = [
        'name', 'address'
    ];
}
