<?php

namespace App\models\bunch;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Selectable;

class Bunch extends Model
{
    use SoftDeletes;
    use Selectable;

    protected $fillable = ['name', 'description'];
}
