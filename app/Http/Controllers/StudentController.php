<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Student::orderBy('nim')->paginate(5);
        return view('student.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Session::flash('nim', $request->nim);
        Session::flash('name', $request->name);
        Session::flash('major', $request->major);

        $request->validate([
            'nim'=>'required|numeric|unique:student,nim',
            'name'=>'required',
            'major'=>'required',

        ],[
            'nim.required'=>'The NIM is required',
            'nim.numeric'=>'The NIM must be a number',
            'nim.unique'=>'The NIM is already taken',
            'name.required'=>'The Name is required',
            'major.required'=>'The Major is required',
        ]);
        $data = [
            'nim'=>$request->nim,
            'name'=>$request->name,
            'major'=>$request->major,
        ];
        Student::create($data);
        return redirect()->to('student')->with('success', 'Add Student data successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = Student::where('nim', $id)->first();
        return view('student.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name'=>'required',
            'major'=>'required',

        ],[
            'name.required'=>'The Name is required',
            'major.required'=>'The Major is required',
        ]);
        $data = [
            'name'=>$request->name,
            'major'=>$request->major,
        ];
        Student::where('nim', $id)->update($data);
        return redirect()->to('student')->with('success', 'Update Student data successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Student::where('nim', $id)->delete();
        return redirect()->to('student')->with('success', 'Successfully deleted data');
    }
}
