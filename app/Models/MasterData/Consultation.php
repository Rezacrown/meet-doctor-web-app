<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consultation extends Model
{

    use SoftDeletes;

    // $table berfungsi untuk declare nama table dari yang ada di database
    public $table = 'consultation';

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

    public function appointment()
    {
        return $this->hasMany('App\Models\Operational\Appointment', 'consultation_id');
    }
}
