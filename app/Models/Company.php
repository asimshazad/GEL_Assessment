<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Company extends Model
{
    protected $fillable = ['name','email','website','logo'];

    public function getCreatedAtAttribute($value)
    {
        return date('d F, Y', strtotime($value));
    }
    
    public function logo()
    {
       
       if ($this->logo != '') {

         return '<img width="100" height="100" src="'.asset($this->logo).'" />' ;
        }else{
            return '-';
        }
    }

}
