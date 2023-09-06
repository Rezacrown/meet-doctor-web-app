<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoleUser extends Model
{
    // use HasFactory;

    use SoftDeletes;

    // $table berfungsi untuk declare nama table dari yang ada di database
    public $table = 'role_user';

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
        'role_id',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // relasi dengan user table
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    // relasi dengan table role
    public function role_user()
    {
        return $this->belongsTo('App\Models\ManagementAccess\Role', 'role_id', 'id');
    }


    // may to many
         public function permission()
    {
        return $this->belongsToMany('App\Models\ManagementAccess\Permission',);
    }
}
