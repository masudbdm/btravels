<?php

namespace Cp\QuestionAnswer\Controllers;


use App\Http\Controllers\Controller;
use Cp\QuestionAnswer\Models\QuestionAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class AdminQuestionAnswerController extends Controller
{

    public function questionAnswersAll()
    {
        menuSubmenu('questionAnswer', 'questionAnswersAll');
        $data['questionAnswers'] = QuestionAnswer::orderBy('drag_id')->latest()->paginate(30);
        return view('questionanswer::admin.questionanswer.questionAnswersAll', $data);
    }


    public function questionAnswerCreate()
    {
        menuSubmenu('questionAnswer', 'questionAnswerCreate');
        return view('questionanswer::admin.questionanswer.questionAnswerCreate');
    }

    public function questionAnswerStore(Request $request)
    {
        // dd($request->all());
        menuSubmenu('questionAnswer', 'questionAnswerStore');

        // $this->validate($request, [
        //     'question' => 'required|string',
        //     'answer' => 'required|string', 
        // ]);

        $qa = new QuestionAnswer();
        $qa->question = $request->question;
        $qa->answer = $request->answer;
        $qa->active = $request->active ? 1 : 0;
        $qa->addedby_id = Auth::id();
        $qa->save();

        cache()->flush();
        toast('Question Answer Create Successfully', 'success');
        return redirect()->back();
    }

    public function questionAnswerEdit(QuestionAnswer $qa)
    {
        menuSubmenu('questionAnswer', 'questionAnswerEdit');
        $data['qa'] = $qa;
        return view('questionanswer::admin.questionanswer.questionAnswerEdit', $data);
    }

    public function questionAnswerUpdate(Request $request, QuestionAnswer $qa)
    {
        // dd($client);
        menuSubmenu('questionAnswer', 'questionAnswerEdit');
        // $this->validate($request, [
        //    'question' => 'required|json',
        //    'answer' => 'required|string', 
        // ]);

        $qa->question = $request->question;
        $qa->answer = $request->answer;
        $qa->active = $request->active ? 1 : 0;
        $qa->editedby_id = Auth::id();
        $qa->save();

        toast('Question Answer successfully updated', 'success');
        return redirect()->back();
    }

    public function questionAnswerDetails(QuestionAnswer $qa)
    {
        menuSubmenu('questionAnswer', 'questionAnswerDetails');
        $data['qa'] = $qa;
        return view('questionanswer::admin.questionanswer.questionAnswerDetails', $data);
    }



    public function questionAnswerDelete(QuestionAnswer $qa)
    {
        menuSubmenu('questionAnswer', 'questionAnswerEdit');
        $qa->delete();
        toast('Question Answer successfully deleted', 'success');
        return redirect()->back();
    }


    public function questionAnswerActive(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('question_answers')->where('id', $request->id)->update(['active' => 1]);
        } else {
            DB::table('question_answers')->where('id', $request->id)->update(['active' => 0]);
        }
        return response()->json(['msg' => 'Status Successfully updated ', 'status' => true]);
    }

    public function questionAnswerSort(Request $request)
    {
        foreach ($request->sorted_data as $key => $d) {
            DB::table('question_answers')->where('id', $d)->update(['drag_id' => ($key + 1)]);
        }
        return response()->json([
            'success' => true,
        ]);
    }






}