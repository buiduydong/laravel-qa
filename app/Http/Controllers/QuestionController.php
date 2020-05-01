<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FormRequestQuestion;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use App\Question;

class QuestionController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => array('index', 'show')]);
    }
    public function index()
    {
        $questions = Question::orderBy('id','DESC')->paginate(5);
        return view('questions.index',compact('questions'));
    }

   
    public function create()
    {
        return view('questions.create');
    }

    public function store(FormRequestQuestion $request)
    {
        $request->user()->questions()->create($request->only('title','body'));
        return redirect('/questions');
    }

    
    public function show($id )
    {
        $question = Question::find($id);
        // $question->views = $question->views + 1;
        // $question->save();
        $question->increment('views');
        return view('questions.show',compact('question'));
    }

 
    public function edit($id)
    {
        $question = Question::findOrFail($id);
        if (Gate::allows('updateAndDelete-question', $question)) {
            return view('questions.edit',compact('question'));
        }
        abort(403, 'Bạn không có quyền sửa câu hỏi này nhé!.');
    }


    public function update(FormRequestQuestion $request, Question $question)
    {
   
        $question->update($request->only('title','body'));
        return redirect('/questions');
        
    }

    public function destroy(Question $question)
    {
        if (Gate::allows('updateAndDelete-question', $question)) {
            $question->delete();
        return redirect()->back();
        }
        abort(403, 'Bạn không có quyền xóa câu hỏi này nhé!.');
    }

}
