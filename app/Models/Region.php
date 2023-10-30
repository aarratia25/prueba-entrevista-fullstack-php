<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Region extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id_reg';
    protected $fillable = ['description', 'status'];
    protected $dates = ['deleted_at'];

    public function communes()
    {
        return $this->hasMany(Commune::class, 'id_reg');
    }
}
