<?php

namespace App\Models\Product;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use App\Enums\Product\ProductCategoryStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class ProductCategory extends Model implements TranslatableContract
{
    use HasFactory ,Translatable;
    protected $translatedAttributes =['name','description'];
    protected $fillable = ['is_active', 'image'];
    protected $casts = [
        "is_active"=>ProductCategoryStatus::class,
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
