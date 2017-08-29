<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    protected $fillable = ['adress', 'contact_number', 'contact_email', 'site_name'];
}
