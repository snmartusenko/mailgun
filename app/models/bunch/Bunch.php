<?php

namespace App\models\bunch;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bunch extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'description'];
}
