<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Polsek;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;




    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    // protected $with = ['polsek'];



    public function polsek()
    {
        return $this->belongsTo(Polsek::class,'polsek_id');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->Join('Polseks','Polseks.id','=','Users.polsek_id');
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where(function($query) use($search){
                   $query->where('name', 'like', '%'. strtoupper($search) .'%')
                         ->orWhere('phone', 'like', '%'. $search .'%')
                         ->orWhere('email', 'like', '%'.  strtoupper($search) .'%')
                         ->orWhere( 'nama_polsek'  ,  strtoupper($search) )
                         ->orWhere( 'Users.created_at','like', '%'.  strtoupper($search) .'%');
               });
           });
           $query->when($filters['polsek_id'] ?? false, function($query, $search){
            return $query->where(function($query) use($search){
                   $query->where('polsek_id', $search);
               });
           });


    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
