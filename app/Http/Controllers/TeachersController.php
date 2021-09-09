<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('students.index');
        $teachers = Teachers::latest()->paginate(5);
    
        return view('teachers.index',compact('teachers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'email'=> 'required',
            // 'password'  =>  'required|min:8|confirmed',
            // 'confirm_password'  =>  'required|min:8|confirmed',
            'phone'=> 'required',
            'gender'=> 'required',
            'dob'=> 'required',
            'address'=> 'required',

        ]);

        // Teachers::where('id', $teacher->id)
        // ->insert([
        //     'name' => $request->input('name'),
        //     'email' => $request->input('email'),
        //     'password' => $request->input('password'),
        //     'confirm_password' => $request->input('confirm_password'),
        //     'phone' => $request->input('phone'),
        //     'gender' => $request->input('gender'),
        //     'dob' => $request->input('dob'),
        //     'address' => $request->input('address'),
            
        // ]);
 
        Teachers::create($request->all());
    
    //     $password = $request -> password; // password is form field
    //    $hashed = Hash::make($password);

        // $request->teachers()->fill([
        //     'password' => Hash::make($request->newPassword)
        // ])->save();
        // $password = request('password'); // get the value of password field
        // $hashed = Hash::make($password); // encrypt the password
        return redirect()->route('teachers.index')->with('success','Teacher Added Successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teachers  $students
     * @return \Illuminate\Http\Response
     */
    public function show(Teachers $teacher)
    {
        // return redirect()->route('students.index');
        return view('teachers.show',compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function edit(Teachers $teacher)
    {
        return view('teachers.edit',compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teachers  $students
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teachers $teacher)
    {
        $request->validate([
            'name'=> 'required',
            'email'=> 'required',
            // 'password'  =>  'required|min:8|confirmed',
            // 'confirmPassword'  =>  'required|min:8|confirmed',
            'phone'=> 'required',
            'gender'=> 'required',
            'dob'=> 'required',
            'address'=> 'required',

        ]);

        Teachers::where('id', $teacher->id)
        ->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'confirm_password' => $request->input('confirm_password'),
            'phone' => $request->input('phone'),
            'gender' => $request->input('gender'),
            'dob' => $request->input('dob'),
            'address' => $request->input('address'),
            
        ]);

        // Teachers::update($request->all());
        return redirect()->route('teachers.index')->with('success','Teacher Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teachers  $students
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teachers $teacher)
    {
        $teacher->delete();
        return redirect()->route('teachers.index')->with('success','Teacher Deleted Successfully!');
    }
}
