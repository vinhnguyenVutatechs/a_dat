<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $fillable = ['id','product', 'ciento'];
    public $timestamps = false;

    /**
     * Get the user associated with the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Users()
    {
        return $this->hasOne(Uses::class, 'id_product', 'id');
    }
}
