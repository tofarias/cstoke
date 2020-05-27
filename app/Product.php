<?php

namespace CStoke;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'product';
    protected $attributes = [
        'active' => 1,
        'lower_limit' => 100
    ];

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'model','description'
    ];

    public function productsIn()
    {
        return $this->hasMany(ProductIn::class);
    }

    public function productsOut()
    {
        return $this->hasMany(ProductOut::class);
    }

    public function manufacturer(){
        return $this->belongsTo(Manufacturer::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function createdBy(){
        return $this->belongsTo(User::class);
    }

    public function updatedBy(){
        return $this->belongsTo(User::class);
    }
}
