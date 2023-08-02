<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use SoftDeletes;

    // $table berfungsi untuk declare nama table dari yang ada di database
    public $table = 'appointment';

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
        'docter_id',
        'user_id',
        'consultation_id',
        'level',
        'date',
        'time',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

     // relasi dengan docter table
    public function docter()
    {
        return $this->belongsTo('App\Models\Operational\Docter', 'docter_id', 'id');
    }

    // relasi dengan consultation table
    public function consultation()
    {
        return $this->belongsTo('App\Models\MasterData\Consultation', 'consultation_id', 'id');
    }

    // relasi dengan user table
    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    // relasi dengan transaction table
    public function transaction(){
        return $this->hasOne('App\Models\Operational\Transaction', 'appointment_id');
    }
}
