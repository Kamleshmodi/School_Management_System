<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExamModel;
use App\Models\ClassModel;
use App\Models\SubjectModel;
use App\Models\ClassSubjectModel;
use App\Models\ExamSheduleModel;
use App\Models\User;
use Auth;


class ExaminationController extends Controller
{
    public function exam_list()
    {
        $data['getRecord'] = ExamModel::getRecord();
        $data['header_title'] = 'Exam List';
        return view('admin.examination.exam.list', $data);
    }

    public function exam_add()
    {
        $data['header_title'] = 'Add New Exam';
        return view('admin.examination.exam.add', $data);
    }

    public function exam_insert(Request $request)
    {
        $exam = new ExamModel;
        $exam->name = $request->name;
        $exam->note = $request->note;
        $exam->created_by = Auth::user()->id;
        $exam->save();

        return redirect('admin/examination/exam/list')->with('success','Exam Successfully Saved');
    }

    // public function exam_edit($id)
    // {
    //     $data['getRecord'] = ExamModel::getSingle($id);
    //     if(!empty($data['getRecord']))
    //     {
    //         $data['header_title'] = 'Edit Exam';
    //         return view('admin.examination.exam.edit', $data);
    //     }
    //     else
    //     {
    //         abort(404);
    //     }
    // }

    public function exam_edit($id)
    {
        $data['getRecord'] = ExamModel::getSingle($id);
        return view('admin.examination.exam.edit', $data);
    }
    

    public function exam_update($id, Request $request)
    {
        $exam = ExamModel::getSingle($id);
        $exam->name = trim($request->name);
        $exam->note = trim($request->note);
        $exam->save();

        return redirect('admin/examination/exam/list')->with('success','Exam Successfully Updated');
    }

    public function exam_delete($id)
    {
       $getRecord = ExamModel::getSingle($id);
       if(!empty($getRecord))
       {
           $getRecord -> is_delete = 1;
           $getRecord -> save();

           return redirect()->back()->with('success','Exam Successfully Deleted');
       }
       else
       {
           abort(404);
       }
    }


    // exam schedule  

    public function exam_schedule(Request $request)
    {
        $data['getClass'] = ClassModel::getClass();
        $data['getExam'] = ExamModel::getExam();
        $result = []; // Initialize the $result variable
    
        if (!empty($request->get('exam_id')) && !empty($request->get('class_id'))) {
            $getSubject = ClassSubjectModel::MySubject($request->get('class_id'));
            foreach ($getSubject as $value) {
                $dataS = array();
                $dataS['subject_id'] = $value->subject_id;
                $dataS['class_id'] = $request->class_id;
                $dataS['subject_name'] = $value->subject_name;
                $dataS['subject_type'] = $value->subject_type;

                $ExamSchedule = ExamSheduleModel::getRecordSingle($request->get('exam_id'), $request->get('class_id'), $value->subject_id);
                if (!empty($ExamSchedule)) {
                    $dataS['exam_date'] = $ExamSchedule->exam_date;
                    $dataS['start_time'] = $ExamSchedule->start_time;
                    $dataS['end_time'] = $ExamSchedule->end_time;
                    $dataS['room_no'] = $ExamSchedule->room_no;
                    $dataS['full_marks'] = $ExamSchedule->full_marks;
                    $dataS['passing_marks'] = $ExamSchedule->passing_marks;
                }
                else
                {
                    $dataS['exam_date'] = '';
                    $dataS['start_time'] = '';
                    $dataS['end_time'] = '';
                    $dataS['room_no'] = '';
                    $dataS['full_marks'] = '';
                    $dataS['passing_marks'] = '';
                }
                
                $result[] = $dataS;
            }
        }
        
        $data['getRecord'] = $result; // Assign the initialized or populated $result
    
        $data['header_title'] = 'Exam Schedule';
        return view('admin.examination.exam_schedule', $data);
    }


    public function exam_schedule_insert(Request $request)
    {
        ExamSheduleModel::deleteRecord($request->exam_id, $request->class_id);
        
        if (!empty($request->schedule)) {
            foreach ($request->schedule as $schedule) {
                ExamSheduleModel::create([
                    'exam_id' => $request->exam_id,
                    'class_id' => $request->class_id,
                    'subject_id' => $schedule['subject_id'],
                    'exam_date' => $schedule['exam_date'],
                    'start_time' => $schedule['start_time'],
                    'end_time' => $schedule['end_time'],
                    'room_no' => $schedule['room_no'],
                    'full_marks' => $schedule['full_marks'],
                    'passing_marks' => $schedule['passing_marks'],
                    'created_by' => Auth::user()->id,
                ]);
            }
            return redirect()->back()->with('success', 'Exam Schedule Successfully Saved');
        }
    
        return redirect()->back()->with('error', 'No Schedule Data Found');
    }


    //Student side
    public function MyExamTimetable(Request $request)
    {
        $class_id = Auth::user()->class_id;
        $getExam = ExamSheduleModel::getExam($class_id);
        $result = array();
        foreach($getExam as $value)
        {
            $dataE = array();
            $dataE['name'] = $value->exam_name;
            $getExamTimetable = ExamSheduleModel::getExamTimetable($value->exam_id, $class_id);
            $result = array();
            foreach($getExamTimetable as $valueS)
            {
                $dataS = array();
                $dataS['subject_name'] = $valueS->subject_name;
                $dataS['exam_date'] = $valueS->exam_date;
                $dataS['start_time'] = $valueS->start_time;
                $dataS['end_time'] = $valueS->end_time;
                $dataS['room_no'] = $valueS->room_no;
                $dataS['full_marks'] = $valueS->full_marks;
                $dataS['passing_marks'] = $valueS->passing_marks;
                $resultS[] = $dataS;
            }
            $dataE['exam'] = $resultS;
            $result[] = $dataE;
        }
        $data['getRecord'] = $result;

        $data['header_title'] = 'My Exam Timetable';
        return view('student.my_exam_timetable', $data);
    }


}
