<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Role extends Model
{
    // use HasFactory;

    use SoftDeletes;

    // $table berfungsi untuk declare nama table dari yang ada di database
    public $table = 'role';

    // setiap varibel punya fungsi masing2 sesuai penamaan
    // this field must Type Date = ( YYYY-MM-DD MM-SS )
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // variabel $guarded berfunsgi untuk menentukan field yang tidak boleh diizinkan diisi
    protected $guarded = [];

    // variabel $fillable berfunsgi untuk menentukan field yang boleh diisi
    protected $fillable = [
        'title',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // relasi dengan table role_user
    public function role_user() {
        return $this->hasMany('App\Models\ManagementAccess\RoleUser', 'role_id');
    }

    // relasi dengan table role_user
    public function permission_role() {
        return $this->hasMany('App\Models\ManagementAccess\PermissionRole', 'role_id');
    }


    // case relation many to many

    // relasi dengan table User
    public function user(){
        return $this->belongsToMany(User::class, 'role_user');
    }

    // dalam relasi manyToMany dan BelongsTomany, parameter kedua tidak ditulis dikarenakan sebagai contoh Setiap User akan punya banyak Role dan role juga akan punya banyak user yg menjadikannya tidak bisa dikasih spesifik collumn sebagai foreign key nya

    // relasi dengan table permission
    public function permission() {
        return $this->belongsToMany('App\Models\ManagementAccess\Permission', 'permission_role');
    }


}
