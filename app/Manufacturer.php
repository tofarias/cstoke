<?php

namespace CStoke;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'prod_manufacturer';

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description',
    ];
}
