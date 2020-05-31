<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ToDo;
class ToDoController extends Controller
{
    public function index(){
        $todo=ToDo::all();
        return view('ToDo')->with(['todo'=>$todo]);
    }
    public function store(Request $request){
        $request->validate([
            'title' => 'required|min:5|max:255',
        ]);
        ToDo::create($request->all());
        return redirect()->back()->with('message','ToDo created!');
    }
    public function create(Request $request){
        return view('ToDo');
    }
    public function destroy($id){
        $item = ToDo::find($id);
        $item->delete();
        return redirect()->back();
    }
    public function edit(Request $request,$id){
        $item = ToDo::find($id);
        return view('edit')->with('taskTitle', $item);
    }
    public function complited($id){
        $item = ToDo::find($id);
        $item->complited=true;
        $item->save();
        return redirect()->back();
    }
    public function incomplite($id){
        $item = ToDo::find($id);
        $item->complited=false;
        $item->save();
        return redirect()->back();
    }
    public function update(Request $request,$id){
        $item = ToDo::find($id);
        $item->title=$request->title;
        $item->save();
        return redirect()->route('index');
    }
    public function search(Request $request){
        $value=$request->search;
        $todo = ToDo::where('title', 'LIKE', "%$value%")->get();
        return view('ToDo')->with('todo', $todo);
    }
}
