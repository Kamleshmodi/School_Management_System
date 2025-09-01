<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use Str;

class TeacherController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getTeacher();
        $data['header_title'] = "Teacher List";
        return view('admin.teacher.list', $data);
    }

    public function add()
    {
        $data['header_title'] = "Add New Teacher";
        return view('admin.teacher.add', $data);
    }

    public function insert(Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users',
            'mobile_number' => 'required|numeric',
            'marital_status' => 'max:50',
        ]);

       $teacher = new User;
       $teacher->name = trim($request->name);
       $teacher->last_name = trim($request->last_name);
       $teacher->gender = trim($request->gender);
       if(!empty($request->date_of_birth))
       {
         $teacher->date_of_birth = trim($request->date_of_birth);
       }
       if(!empty($request->admission_date))
       {
         $teacher->admission_date = trim($request->admission_date);
       }
       if(!empty($request->file('profile_pic')))
       {
         $ext = $request->file('profile_pic')->getClientOriginalExtension();
         $file = $request ->file('profile_pic');
         $randomStr = date('YmdHis').Str::random(20);
         $filename = strtolower($randomStr).'.'.$ext;
         $file->move(public_path('uploads/profile/'), $filename);

         $teacher->profile_pic = $filename;
       }
       $teacher->marital_status = trim($request->marital_status);
       $teacher->address = trim($request->address);
       $teacher->permanent_address = trim($request->permanent_address);
       $teacher->qualification = trim($request->qualification);
       $teacher->work_experience = trim($request->work_experience);
       $teacher->note = trim($request->note);
       $teacher->email = trim($request->email);
       $teacher->mobile_number = trim($request->mobile_number);
       $teacher->password = Hash::make(trim($request->password));
       $teacher->user_type = '2';
       $teacher->save();

       return redirect('admin/teacher/list')->with('success', 'Teacher added successfully');
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if (!empty($data['getRecord'])) 
        {
            $data['header_title'] = 'Edit Teacher';
            return view('admin.teacher.edit', $data);
        }  
        else 
        {
            abort(404); 
        }
        
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id,
            'mobile_number' => 'required|numeric',
            'marital_status' => 'max:50',
        ]);

        $teacher = User::getSingle($id);
        $teacher->name = trim($request->name);
        $teacher->last_name = trim($request->last_name);
        $teacher->gender = trim($request->gender);
        if(!empty($request->date_of_birth))
        {
          $teacher->date_of_birth = trim($request->date_of_birth);
        }
        if(!empty($request->admission_date))
        {
          $teacher->admission_date = trim($request->admission_date);
        }
        if(!empty($request->file('profile_pic')))
        {
          $ext = $request->file('profile_pic')->getClientOriginalExtension();
          $file = $request ->file('profile_pic');
          $randomStr = date('YmdHis').Str::random(20);
          $filename = strtolower($randomStr).'.'.$ext;
          $file->move(public_path('uploads/profile/'), $filename);
          
          $teacher->profile_pic = $filename;
        }
        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->marital_status = trim($request->marital_status); 
        $teacher->address = trim($request->address);
        $teacher->permanent_address = trim($request->permanent_address);
        $teacher->qualification = trim($request->qualification);
        $teacher->work_experience = trim($request->work_experience);
        $teacher->note = trim($request->note);
        $teacher->email = trim($request->email);
        $teacher->status = trim($request->status);
        if(!empty($request->password))
        {
          $teacher->password = Hash::make($request->password);
        }
        $teacher->save();
        return redirect('admin/teacher/list')->with('success', 'Teacher updated successfully');
    }

    public function delete($id)
    {
        $getRecord = User::getSingle($id);
        if(!empty($getRecord))
        {  
          $getRecord->is_delete = 1;
          $getRecord->save();
          return redirect('admin/teacher/list')->with('success', 'Teacher deleted successfully');
        }
        else
        {
          abort(404);
        }
    }
}
