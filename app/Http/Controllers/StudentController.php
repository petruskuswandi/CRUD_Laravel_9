<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Teacher;
use App\Models\Activity;

class StudentController extends Controller
{
    public function index()
    {
        // $students = Student::all();
        $user = Auth::user();
        $id = Auth::id();

        $students = Student::paginate(2);
        return view('index', ['data' => $students, 'user' =>$user, 'id' => $id]);
    }

    public function filter()
    {
        $students = Student::where('score', '>=', 80)
        ->where('name', 'LIKE', '%a%')
        ->get();
        return view('filter', compact('students'));
    }

    public function show($id)
    {
        $student = Student::find($id);
        return view('show', ['student' => $student]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'score' => 'required'
        ]);

        Student::create([
            'name' => $req->name,
            'score' => $req->score,
            'teacher_id' => 1
        ]);

        return Redirect::route('index');
    }

    public function edit(Student $student)
    {
        return view('edit', compact('student'));
    }

    public function update(Request $req, Student $student)
    {
        $student->update([
            'name' => $req->name,
            'score' => $req->score
        ]);

        return Redirect::route('index');
    }

    public function delete(Student $student)
    {
        $student->delete();
        return Redirect::route('index');
    }
}
