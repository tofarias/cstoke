<?php

namespace CStoke;
use Illuminate\Database\Eloquent\Model;

class ItemIn extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'prod_item_in';
    protected $attributes = [
    ];

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'price', 'amount', 'weight'
    ];


    public function product(){
        return $this->belongsTo(Product::class);
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
