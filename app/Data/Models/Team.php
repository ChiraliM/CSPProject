<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name', 'size'];

    public function add( $user )
    {
        $this->members()->save( $user );
    }

    public function members()
    {
        return $this->hasMany( User::class );
    }
}
