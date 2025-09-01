<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamSheduleModel extends Model
{
    use HasFactory;

    protected $table = 'exam_schedule';

    protected $fillable = [
        'exam_id',
        'class_id',
        'subject_id',
        'exam_date',
        'start_time',
        'end_time',
        'room_no',
        'full_marks', 
        'passing_marks',
        'created_by',
    ];

    static function getRecordSingle($exam_id, $class_id, $subject_id)
    {
        return ExamSheduleModel::where('exam_id', '=', $exam_id)
            ->where('class_id', '=', $class_id)
            ->where('subject_id', '=', $subject_id)
            ->first();
    }

    static public function deleteRecord($exam_id, $class_id)
    {
        ExamSheduleModel::where('exam_id', '=', $exam_id)
            ->where('class_id', '=', $class_id)
            ->delete(); 
    }

    static public function getExam($class_id)
    {
        return ExamSheduleModel::select('exam_schedule.*', 'exam.name as exam_name')
            ->join('exam', 'exam.id', '=', 'exam_schedule.exam_id')
            ->where('exam_schedule.class_id', '=', $class_id)
            ->groupBy('exam_id')
            ->orderBy('exam_schedule.id', 'asc')
            ->get();
    }   

    static public function getExamTimetable($exam_id, $class_id)
    {
        return ExamSheduleModel::select('exam_schedule.*', 'subject.name as subject_name', 'subject.type as subject_type')
            ->join('subject', 'subject.id', '=', 'exam_schedule.subject_id')
            ->where('exam_schedule.exam_id', '=', $exam_id)
            ->where('exam_schedule.class_id', '=', $class_id)
            ->get();
    }
}
