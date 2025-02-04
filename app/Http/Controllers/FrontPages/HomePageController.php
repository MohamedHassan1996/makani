<?php

namespace App\Http\Controllers\FrontPages;

use App\Models\Blog\Blog;
use App\Models\Feedback\Feedback;
use Illuminate\Http\Request;
use App\Enums\Blog\BlogStatus;
use App\Models\Product\Product;
use App\Models\FrontPage\FrontPage;
use App\Http\Controllers\Controller;
use App\Models\Product\ProductCategory;
use App\Services\FrontPage\FrontPageService;


class HomePageController extends Controller
{
    protected $frontPageService;

    public function __construct(FrontPageService $frontPageService)
    {
        $this->frontPageService = $frontPageService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index($lang='en', $slug=null)
    {
        $locale = app()->getLocale();

        $homePage = FrontPage::where('controller_name', 'HomePageController')
            ->with(['sections.translations' => function ($query) use ($locale) {
                $query->where('locale', $locale);
            }])
            ->first();
        $feedbacks=Feedback::all();
        $productCategory = ProductCategory::all();
        $products = Product::all();

        session(['active_navbar_link' => $slug??'']);

        if($lang == 'ar'){
            session(['body_direction' => [
                'direction' => 'rtl',
                'lang' => 'ar',
                'body_class' => 'rtl'
            ]]);
        }else{
            session(['body_direction' => [
                'direction' => 'ltr',
                'lang' => 'en',
                'body_class' => ''
            ]]);
        }

        return view('Home.index', compact('homePage', 'products','productCategory','feedbacks'));
    }
    public function show($lang = 'en', $slug, $singleSlug, Request $request)
    {
        $product = Product::with('translations')
        ->whereHas('translations', function ($query) use ($singleSlug) {
            $query->where('slug', $singleSlug)->where('locale', app()->getLocale());
        })
        ->first();

        if (!$product) {
            $product = Product::with('translations')
            ->whereHas('translations', function ($query) use ($singleSlug) {
                $query->where('slug', $singleSlug)->whereIn('locale', ['en', 'ar']);
            })
            ->first();
        }

        if (!$product) {
            abort(404);
        }
       return view('Services.Sections.show', compact('product'));
    }
}
