<?php

namespace App\Http\Controllers\FrontPages;

use App\Models\ContactUs\ContactUs;
use Illuminate\Http\Request;
use App\Models\FrontPage\FrontPage;
use App\Http\Controllers\Controller;

class ContactPageController extends Controller
{
    public function index($lang='en', $slug=null)
    {
        $locale = app()->getLocale();
        $homePage = FrontPage::where('controller_name', 'ContactPageController')
            ->with(['sections.translations' => function ($query) use ($locale) {
                $query->where('locale', $locale);
            }])
            ->first();


        return view('Contact.index', compact('homePage'));
    }
    public function store(Request $request)
    {
      dd($request->all());
      ContactUs::create($request->all());
    //   session()->flash('created', __('success.created'))
      return redirect('/contact-us')->with('created',__('success.created') );;
    }
}
