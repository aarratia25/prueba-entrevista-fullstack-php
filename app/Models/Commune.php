<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commune extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id_com';
    protected $fillable = ['id_reg', 'description', 'status'];
    protected $dates = ['deleted_at'];

    public function region()
    {
        return $this->belongsTo(Region::class, 'id_reg');
    }
}
