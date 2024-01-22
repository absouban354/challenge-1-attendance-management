<?php

namespace App\Services;

use App\Models\Attendance;
use App\Models\AttendanceFault;
use App\Models\Employee;
use App\Models\Schedule;
use Exception;
use Spatie\SimpleExcel\SimpleExcelReader;

class AttendanceService
{
    public function upload_attendance($file_path,$file_ext){
        
        SimpleExcelReader::create($file_path,$file_ext)
        ->headersToSnakeCase()
        ->getRows()
        ->each(function(array $rowProperties){
            $schedule_id = Schedule::where('employee_id',$rowProperties["emp_id"])->value('id');
            $attendance=Attendance::create([
                'employee_id' => $rowProperties["emp_id"],
                'schedule_id' => $schedule_id,
                'checkin_time' => $rowProperties["checkin_time"],
                'checkout_time' => ($rowProperties["checkout_time"] != "")?$rowProperties["checkout_time"]:null
            ]);
            if($rowProperties["fault_reason"]){
                AttendanceFault::create([
                    'employee_id'=>$rowProperties["emp_id"],
                    'attendance_id'=>$attendance->id,
                    'fault_reason'=>$rowProperties["fault_reason"],
                    'fault_date'=>$rowProperties["fault_date"]
                ]);
            }
        });
    }
    public function get_employee_attendance($employee_id){
        if(!Employee::find($employee_id)){
            throw new \Exception("Employee with $employee_id does not exists");
        }
        //Retrieve Attendance Information based on Employee Id
        $attendances = Attendance::where(
        'employee_id',$employee_id
        )->get();
        //Return the response in Json
        return $attendances;
    }
}