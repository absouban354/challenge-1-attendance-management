<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'schedule_id',
        'checkin_time',
        'checkout_time'
    ];

    protected $appends = [
        'total_working_hours',
        'employee_name'
    ];

    protected $hidden = [
        'employee'
    ];
    public function getTotalWorkingHoursAttribute(){
        if(!isset($this->checkout_time) || $this->checkout_time == ""){
            return "NA";
        }
        $checkin_date = Carbon::createFromFormat('Y-m-d H:s:i', $this->checkin_time);
        $checkout_date = Carbon::createFromFormat('Y-m-d H:s:i', $this->checkout_time);
        $interval = $checkin_date->diff($checkout_date);
        return $interval->format('%h')." Hours ".$interval->format('%i')." Minutes";

    }

    public function employee(){
        return $this->belongsTo(Employee::class);
    }
    public function schedule(){
        return $this->belongsTo(Schedule::class);
    }

    public function getEmployeeNameAttribute(){
        return $this->employee->name;
    }
}
