<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    //
    protected $table = 'community';

    public function president()
    {
        return $this->hasOne('App\User', 'id', 'president_id');
    }

    public function communityType()
    {
        return $this->hasOne('App\Models\CommunityType', 'id', 'community_type_id');
    }
}
