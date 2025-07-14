<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;

class Polsek extends Model
{
    use HasFactory,HasRoles;

    protected $guarded = ['id'];

    // protected $with = ['user'];

    public function user()
    {
        return $this->hasMany(User::class, 'polsek_id');
    }

}
