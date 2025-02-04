<?php

namespace App\Http\Controllers\FrontPages;

use App\Models\Product\ProductCategory;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Models\Customer\Customer;
use App\Models\FrontPage\FrontPage;
use App\Http\Controllers\Controller;

class AboutPageController extends Controller
{
    public function index($lang='en', $slug=null)
    {
        $locale = app()->getLocale();

        $aboutPage = FrontPage::where('controller_name', 'AboutPageController')
            ->with(['sections.translations' => function ($query) use ($locale) {
                $query->where('locale', $locale);
            }])
            ->first();
        $customercount =Customer::count();
        $productcount =Product::count();
        $productCategoryCount =ProductCategory::count();

        return view('AboutUs.index', compact(['aboutPage','customercount','productcount','productCategoryCount']));
    }
}
