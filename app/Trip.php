<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $fillable = ['slug', 'title', 'description', 'start_date','end_date','location','price'];
}
