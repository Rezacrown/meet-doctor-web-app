<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeUser extends Model
{
    use SoftDeletes;

    // $table berfungsi untuk declare nama table dari yang ada di database
    public $table = 'type_user';

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
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    // cara untuk buat relasi table
    // One to Many relation
    public function detail_user()
    {
        // parameter pertama adalah path Model / Namespace dari model yang ingin direlasikan
        // sedangkan parameter kedua adalah field yang ingin di lakukan relasi
        return $this->hasMany('App\Models\ManagementAccess\DetailUser', 'type_user_id');
    }


}
