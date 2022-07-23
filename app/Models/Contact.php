<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public $fillable = ['fullname','email','gender','postcode','address','building_name','opinion','created_at'];

    public static $rules = array(
        'fullname' => 'required',
        'email' => 'required|email',
        'gender' => 'required',
        'postcode' => 'required|min:8|max:8|regex:/^([0-9]{3})(-[0-9]{4})?$/i',
        'address' => 'required',
        'opinion' => 'required|max:120'
    );
}
