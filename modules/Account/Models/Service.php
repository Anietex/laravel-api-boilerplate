<?php

namespace Swedigo\Modules\Account\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
     public $incrementing = false;

     protected $fillable = ["name","description"];
}
