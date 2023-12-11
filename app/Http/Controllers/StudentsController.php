<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Students;
class StudentsController extends Controller
{
    //select all students.
    public function Students(){
        $students = students::all();
        return response($students);
    }

    public function student($id){
        $students = students::find($id);
        return response($students);
    }
//post or show the data or names of student
    public function post(Request $request)
    {
        $students=new students();
        $students->name = $request->name;
        $students->student_id = $request->student_id;
        $students->created_at0 = $request->created_at0;
      
        $students->save();
        return response([
            "message"=>"studentName added in database!!"
        ]);
    }
//update the names,etc of students
    public function update(Request $request)
    {
        $students = students::findorfail($request->id);

        $students->name = $request->name;
        $students->student_id = $request->student_id;
        $students->created_at0 = $request->created_at0;

        $students->update();
        return response([
            "message"=>"StudentsInfo Updated Succesfully"
        ]);
    }
//delete the names,etc of students
    public function delete($id){
        $user = students::find($id);
        if ($user == null){
            return response([
                "message"=>"Student Record not found"
            ],404);
        }
        else{
            $user->delete();
            return response([
                "message"=>"Student Deleted succesfully!"
            ],200);
        }
    }
}
