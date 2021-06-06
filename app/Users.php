<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
class Users extends Model
{
    protected $table = 'users';
    protected $fillable = ['id_product ', 'email', 'password', 'type', 'status'];
    public $timestamps = true;

    /**
     * Get the user that owns the Users
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Products()
    {
        return $this->belongsTo(Product::class, 'id_product', 'id');
    }
}
