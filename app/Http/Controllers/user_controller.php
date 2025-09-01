<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;

class user_controller extends Controller
{   
    public function MyAccount()
    {
        $data['getRecord'] = User::getSingle(Auth::user()->id);
        $data['header_title'] = 'My Account';

        if(Auth::user()->user_type == '1')
        {
            return view('admin.my_account',$data);
        }
        else if(Auth::user()->user_type == '2')
        {
            return view('teacher.my_account',$data);
        }
        else if(Auth::user()->user_type == '4')
        {
            return view('parent.my_account',$data);
        }
        else if(Auth::user()->user_type == '5')
        {
            return view('student.my_account',$data);
        }
    } 

    public function updateMyAccountAdmin(Request $request)
    {
        $id = Auth::user()->id;

        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'required|min:5',
        ]);
        
        $user = User::getSingle($id);
        $user->name = trim($request -> name);
        $user->last_name = trim($request -> last_name);
        $user->email = trim($request -> email);
        $user->save();
        return redirect()->back()->with('success','Admin Updated Successfully');

    }

    public function updateMyAccountTeacher(Request $request)
    {
        $id = Auth::user()->id;
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
        $teacher->email = trim($request->email);

        $teacher->save();
        return redirect()->back()->with('success', 'Teacher updated successfully');
    }

    public function updateMyAccountParents(Request $request)
    {
        $id = Auth::user()->id;

        $request->validate([
            'email' => 'required|email|unique:users,email,'.$id,
            'mobile_number' => 'required|string|max:10|Min:10',
            'address' => 'required|string|max:255',
            'occupation' => 'required|string|max:255',
        ]);

        $parent = User::getSingle($id);
        $parent->name = trim($request->name);
        $parent->last_name = trim($request->last_name);
        $parent->gender = trim($request->gender);
        $parent->occupation = trim($request->occupation);
        $parent->address = trim($request->address);

        // Handling Image Upload
        if ($request->hasFile('profile_pic')) {
            $file = $request->file('profile_pic');
            $ext = $file->getClientOriginalExtension();
            $randomStr = date('Ymdhis') . Str::random(30);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move(public_path('uploads/profile/'), $filename);
            $parent->profile_pic = $filename;
        }
        $parent->mobile_number = trim($request->mobile_number);
        $parent->email = trim($request->email);
        if(!empty($request->password))
        {
            $parent->password = Hash::make($request->password);
        }
        $parent->save();
        return redirect()->back()->with('success', 'Parent updated successfully');
    }

    public function updateMyAccountStudent(Request $request)
    {
        $id = Auth::user()->id;

        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required|email|unique:users,email,'.$id,
            'height' => 'required|max:10',
            'weight' => 'required|max:10',
            'blood_group' => 'required|string|max:15',
            'caste' => 'required|string|max:15',
            'religion' => 'required|string|max:15',
            'mobile_number' => 'required|string|max:10|Min:10',
        ]);

        $student = User::getSingle($id);
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
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
        $student->email = trim($request->email);
        $student->save();
        return redirect()->back()->with('success', 'Student updated successfully');
    }

    public function change_password()
    {
        $data['header_title'] = 'Change Password';
        return view('profile.change_password',$data);
    }

    public function update_change_password(Request $request)
    {
        $user = User::getSingle(Auth::user()->id);
        if(Hash::check($request -> old_password, $user -> password))
        {
            $user -> password = Hash::make($request -> new_password);
            $user -> save();
            return redirect()->back()->with('success','Password Successfully Updated');
        }
        else
        {
            return redirect()->back()->with('error','Old Password is not correct');
        }
    }
}
