<?php

namespace App\Http\Controllers\FrontPages;

use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Models\FrontPage\FrontPage;
use App\Enums\Product\ProductStatus;
use App\Http\Controllers\Controller;
use App\Models\Product\ProductCategory;

class ServicePageController extends Controller
{
    public function index($lang='en', $slug=null)
    {
        $locale = app()->getLocale();
        $ServicePage = FrontPage::where('controller_name', 'ServicePageController')->first();
        $productCategories = ProductCategory::all();
        $productsQuery = Product::with('images')
        ->where('is_active', ProductStatus::ACTIVE->value);

        return view('Services.index', compact( 'productCategories'));
    }

}
