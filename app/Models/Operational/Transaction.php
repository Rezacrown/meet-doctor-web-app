<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    // $table berfungsi untuk declare nama table dari yang ada di database
    public $table = 'transaction';

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
        'appointment_id',
        'vat',
        'total',
        'sub_total',
        'fee_doctor',
        'fee_specialist',
        'fee_hospital',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function appointment()
    {
        return $this->belongsTo('App\Models\Operational\Appointment', 'appointment_id', 'id');
    }
}
