<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\StudentUpdateRequest;

class CrudController extends Controller
{
    public function store(StudentStoreRequest $request)
    {
        $data = new Student();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $image = $request->file('image');
        $imageName = rand().'.'.time().'.'.$image->getClientOriginalExtension();
        $directory = 'upload/student/';
        $image->move($directory,$imageName);
        $data->image = $directory.$imageName;
        $data->save();
        return back()->with('success','Data Saved Successfully');
    }
    public function index()
    {
        $students = Student::all();
        return view('student.student_list_show',compact('students'));   
    }
    public function edit($id)
    {
        $students = Student::all();
        $single_student = Student::findOrFail($id);
        
        return view('student.student_edit',compact('single_student','students'));
    }
    public function update(StudentUpdateRequest $request, $id){
      
        $data = Student::findOrFail($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        if($request->file('image'))
        {
            if($data->image!=null)
            {
                unlink($data->image);
            }
            
            $image = $request->file('image');
            $imageName = rand().'.'.time().'.'.$image->getClientOriginalExtension();
            $directory = 'upload/student/';
            $image->move($directory,$imageName);
            $data->image = $directory.$imageName;
        }
        
        $data->save();
        return redirect()->route('home')->with('success','Data Updated Successfully');
    }
    public function destroy($id)
    {
        $data = Student::findOrFail($id);
        $data->delete();
        return redirect()->route('home')->with('success','Data Deleted Successfully');
    }
    
}
