<?php

namespace App\Http\Controllers\API\Dashboard\ContactUs;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ContactUs\ContactUs;
use App\Http\Controllers\Controller;
use App\Models\ContactUs\ContactUsMessage;

class WebsiteContactUsController extends Controller
{
    public function create(Request $request)
    {

        try {
            DB::beginTransaction();


            $contactUs  = ContactUs::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'subject' => $request->subject,
            ]);

            $contactUsMessages = ContactUsMessage::create([
                'contact_us_id' => $contactUs->id,
                'message' => $request->message,
                'is_admin' => 1,
                'is_read' => null

            ]);

            DB::commit();

            return response()->json([
                'message' => __('messages.success.created'),
            ],200);


        }catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

    }
}
