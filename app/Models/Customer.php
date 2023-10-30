<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'dni';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['dni', 'id_reg', 'id_com', 'email', 'name', 'last_name', 'address', 'date_reg', 'status'];
    protected $dates = ['deleted_at', 'date_reg'];

    public function commune()
    {
        return $this->belongsTo(Commune::class, 'id_com');
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'id_reg');
    }
}
