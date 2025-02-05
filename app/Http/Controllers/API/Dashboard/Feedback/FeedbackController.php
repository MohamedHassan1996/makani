<?php

namespace App\Http\Controllers\API\Dashboard\Feedback;

use App\Http\Requests\Feedback\CreateFeedbackRequest;
use App\Http\Requests\Feedback\UpdateFeedbackRequest;
use App\Services\Feedback\FeedbackServices;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\Feedback\Feedback;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;

class FeedbackController extends Controller
{
    protected $feedbackServices;
    public function __construct(FeedbackServices $feedbackServices)
    {
          $this->middleware('auth:api');
          $this->feedbackServices = $feedbackServices;
          $this->middleware('permission:all_feedbacks',['only'=>['index']]);
          $this->middleware('permission:create_feedback',['only'=>['create']]);
          $this->middleware('permission:edit_feedback',['only'=>'edit']);
          $this->middleware('permission:update_feedback',['only'=>'update']);
          $this->middleware('permission:delete_feedback',['only'=>'delete']);
    }
    public function index()
    {
       $feedbacks = $this->feedbackServices->all();
        return response()->json([
            "data"=>$feedbacks
        ]);

    }
    public function edit(Request $request)
    {
        try {
          $feedback=$this->feedbackServices->edit($request->feedbackId);
            return response()->json([
                "data"=>$feedback
            ]);
        } catch (ModelNotFoundException $th) {
            return response()->json([
                "message"=>"notFound"
            ]);
        }

    }

    public function create(CreateFeedbackRequest $createFeedbackRequest)
    {
        $this->feedbackServices->create($createFeedbackRequest->validated());
         return response()->json([
            'message' => __('messages.success.created')
        ], 200);
    }
    public function update(UpdateFeedbackRequest $updateFeedbackRequest)
    {
        $this->feedbackServices->update($updateFeedbackRequest->validated());
         return response()->json([
           'message' => __('messages.success.updated')
        ], 200);

    }
    public function delete(Request $request)
    {
      $this->feedbackServices->delete($request->feedbackId);
        return response()->json([
            'message' => __('messages.success.deleted')
        ], 200);
    }

}
