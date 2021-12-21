<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\student;


class StudentController extends Controller
{
    public function __construct(){
    $this->middleware(['auth'])->only(['index',]);
}
//     public function index(){

// return view('posts.index');
//     }
public function index()
{
    $posts = Student::latest()->paginate(20);

    return view('posts.index', [
        'posts' => $posts
    ]);
}
public function store(Request $request)
{

    $request->validate([
        'title' => 'required',
        'description' => 'required',
    ]);

    Student::create([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'user_id' => auth()->user()->id
    ]);

    return back();
}
public function edit(Student $post ){
    return view('posts.editPosts',['post'=>$post]);

}
public function update(Student $post){

    request()->validate([
'title'=>'required',
'description'=>'required'
    ]) ;
$post->update([
'title'=>request('title'),
'description'=>request('description')
]);
return redirect('/index');
}
public function destroy(Student $post){
$post->delete();

return back();
}
}
