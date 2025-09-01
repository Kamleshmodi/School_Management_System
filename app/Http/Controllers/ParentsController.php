<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class ParentsController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getParents();
        $data['header_title'] = 'Parent List';
        return view('admin.parents.list', $data);
    }

    public function add()
    { 
        $data['header_title'] = 'Add New Parent';
        return view('admin.parents.add', $data);
    }


    public function insert(Request $request)
    {
        // Validate Request 
        $request->validate([
            'email' => 'required|email|unique:users',
            'mobile_number' => 'required|string|max:10|Min:10',
            'address' => 'required|string|max:255',
            'occupation' => 'required|string|max:255',
        ]);

        $student = new User();
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->gender = trim($request->gender);
        $student->occupation = trim($request->occupation);
        $student->address = trim($request->address);

        // Handling Image Upload
        if(!empty($request -> file('profile_pic')))
        { 
        $ext = $request->file('profile_pic')->getClientOriginalExtension();
        $file = $request->file('profile_pic');
        $randomStr = date('Ymdhis') . Str::random(30);
        $filename = strtolower($randomStr) . '.' . $ext;
        $file->move('uploads/profile/', $filename);
        $student->profile_pic = $filename;
        }
        $student->mobile_number = trim($request->mobile_number);
        $student->status = trim($request->status);
        $student->email = trim($request->email);
        $student->password = Hash::make($request->password);
        $student->user_type = '4';
        $student->save();

        return redirect('admin/parents/list')->with('success', 'Parent created successfully');
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if (!empty($data['getRecord'])) {
            $data['header_title'] = 'Edit Parent';
            return view('admin.parents.edit', $data);
        }  
        else 
        {
            abort(404); 
        }
        
    }

    public function update(Request $request, $id)
    {
        // Validate Request
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
        $parent->status = trim($request->status);
        $parent->email = trim($request->email);
        if(!empty($request->password))
        {
            $parent->password = Hash::make($request->password);
        }
        $parent->save();
        return redirect('admin/parents/list')->with('success', 'Parent updated successfully');
    }

    public function delete($id)
    { 
        $parent = User::find($id);
        $parent->delete();
        return redirect('admin/parents/list')->with('success', 'Parent deleted successfully');
    }

    public function myStudent($id)
    {
        $data['getParent'] = User::getSingle($id);
        $data['parent_id'] = $id;
        $data['getSearchStudent'] = User::getSearchStudent();
        $data['getRecord'] = User::getMyStudent($id);

        $data['header_title'] = 'Parent Student List';
        return view('admin.parents.my_student', $data);
    }

    public function AssignStudentParent($student_id, $parent_id)
    {
        $student = User::getSingle($student_id);
        $student->parent_id = $parent_id;
        $student->save();

        return redirect()->back()->with('success', 'Student Assigned Successfully');
    }

    public function AssignStudentParentDelete($student_id)
    {
        $student = User::getSingle($student_id);
        $student->parent_id = null;
        $student->save();   
        return redirect()->back()->with('success', 'Student Unassigned Successfully');
    }

    public function myStudentParents()
    {
        $id = Auth::user()->id;

        $data['getParent'] = User::getSingle($id);
        $data['getRecord'] = User::getMyStudent($id);
        $data['header_title'] = 'Parent Student List';
        
        return view('parent.my_student', $data);
    }
}
