<?php
namespace App\Services\Feedback;

use App\Models\Feedback\Feedback;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Facades\Request;

class FeedbackServices
{
    public function all()
    {
        $feedbacks=QueryBuilder::for(Feedback::class)
        ->allowedFilters(['name', 'feedback'])
        ->get();
        return $feedbacks;
    }
    public function edit($id)
    {
        $feedback=Feedback::findOrFail($id);
        return $feedback;
    }
    public function create(array $data)
    {
       return  Feedback::create($data);
    }
    public function update(array $data)
    {

        $feedback=Feedback::where('id',$data['feedbackId'])->first();
        $feedback->update([
            "name"=>$data['Name'],
            "feedback"=>$data['Feedback'],
            "rating"=>$data['Rating']
        ]);
        return $feedback;
    }
    public function delete($id)
    {
        $feedback=Feedback::findOrFail($id);
        $feedback->delete();
    }

}
?>
