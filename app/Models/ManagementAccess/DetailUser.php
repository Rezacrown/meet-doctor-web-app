<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailUser extends Model
{
    // use HasFactory;

    use SoftDeletes;

    // $table berfungsi untuk declare nama table dari yang ada di database
    public $table = 'detail_user';

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
        'user_id',
        'type_user_id',
        'contact',
        'address',
        'photo',
        'gender',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    // cara untuk buat relasi table
    // belongsTo untuk menautkan sesama relasi
    public function type_user()
    {
        // belongsTo punya 3 parameter yaitu (path Model, field foreign Key, primary key yang dijadikan foreign key dari table hasMany/hasOne)
        return $this->belongsTo('App\Models\MasterData\TypeUser', 'type_user_id', 'id');
    }

    // relasi dengan user table
    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
