<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getStudent();
        $data['header_title'] = 'Student List';
        return view('admin.student.list', $data);
    }

    public function add()
    {
        $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = 'Add New Student';
        return view('admin.student.add', $data);
    }

    public function insert(Request $request)
    {
        // Validate Request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'admission_date' => 'required|date',
            'status' => 'required|numeric',
        ]);        

        $student = new User();
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);

        $student->admission_number = User::generateAdmissionNumber(); // Auto-generate Unique Number
        
        $student->roll_number = trim($request->roll_number);
        $student->class_id = trim($request->class_id);
        $student->gender = trim($request->gender);

        if (!empty($request->date_of_birth)) {
            $student->date_of_birth = trim($request->date_of_birth);
        } 

        // Handling Image Upload
        if ($request->hasFile('profile_pic')) {
            $file = $request->file('profile_pic');
            $ext = $file->getClientOriginalExtension();
            $randomStr = date('Ymdhis') . Str::random(30);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move(public_path('uploads/profile/'), $filename);
            $student->profile_pic = $filename;
        }

        $student->caste = trim($request->caste);
        $student->religion = trim($request->religion);
        $student->mobile_number = trim($request->mobile_number);

        if (!empty($request->admission_date)) {
            $student->admission_date = date('Y-m-d', strtotime($request->admission_date));
        }

        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->status = trim($request->status);
        $student->email = trim($request->email);
        $student->password = Hash::make($request->password);
        $student->user_type = '5';
        $student->save();

        return redirect('admin/student/list')->with('success', 'Student added successfully');
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if (!empty($data['getRecord'])) {
            $data['getClass'] = ClassModel::getClass();
            $data['header_title'] = 'Edit Student';
            return view('admin/student/edit', $data);
        }  
        else 
        {
            abort(404);
        }
        
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'admission_date' => 'required|date',
            'status' => 'required|numeric',
        ]);
        

        $student = User::getSingle($id);
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        // Admission Number Update नहीं करना
        $student->admission_number = $student->admission_number;
        $student->roll_number = trim($request->roll_number);
        $student->class_id = trim($request->class_id);
        $student->gender = trim($request->gender);

        if (!empty($request->date_of_birth)) 
        {
            $student->date_of_birth = trim($request->date_of_birth);
        }

        if (!empty($request->file('profile_pic')))
        {
            if(!empty($student->getProfile()))
            {
                unlink(public_path('uploads/profile/'.$student->profile_pic));
            }
            $file = $request->file('profile_pic');
            $ext = $file->getClientOriginalExtension();
            $randomStr = date('Ymdhis') . Str::random(30);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move(public_path('uploads/profile/'), $filename); 
            $student->profile_pic = $filename;
        }
        
        $student->caste = trim($request->caste);
        $student->religion = trim($request->religion);
        $student->mobile_number = trim($request->mobile_number);

        if (!empty($request->admission_date)) 
        {
            $student->admission_date = date('Y-m-d', strtotime($request->admission_date));
        }

        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->status = trim($request->status);
        $student->email = trim($request->email);
        if(!empty($request->password))
        {
            $student->password = Hash::make($request->password);
        }
        $student->save();
        return redirect('admin/student/list')->with('success', 'Student updated successfully');
    }

    public function delete($id)
    {
        $student = User::find($id);
        $student->delete();
        return redirect('admin/student/list')->with('success', 'Student deleted successfully');
    }

    //teacher side 
    public function MyStudent()
    {
        $data['getRecord'] = User::getTeacherStudent(Auth::user()->id);
        $data['header_title'] = 'My Student List'; 
        return view('teacher.my_student', $data);
    }

}
