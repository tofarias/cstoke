<?php

namespace CStoke;
use Illuminate\Database\Eloquent\Model;

class ProductOut extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'product_out';
    protected $attributes = [
    ];

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'price', 'amount'
    ];
    

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
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
