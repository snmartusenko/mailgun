<?php

namespace App\models\template;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Selectable;

class Template extends Model
{
    use SoftDeletes;
    use Selectable;

    protected $fillable = ['name', 'content'];

}
