<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\AttendanceFault;
use App\Models\Employee;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\SimpleExcel\SimpleExcelReader;
use App\Services\AttendanceService;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct(protected AttendanceService $service)
    {
        
    }
    public function index()
    {
        //
        $attendances = Attendance::with('employee')->get();
        return Inertia::render('Attendance/All',[
            'attendances' => $attendances
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        
    }
    public function uploadAttendance(Request $request)
    {
        
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file_ext = $request->file('file')->getClientOriginalExtension();
        $file_path = $request->file('file')->getRealPath();

        $this->service->upload_attendance($file_path,$file_ext);

        return response()->json(['message' => 'Attendance uploaded successfully!!!']);

    }
    /**
     * Display the specified resource.
     */
    public function show($employee_id)
    {
        //Check if employee exists
        try {
            //code...
            $attendances = $this->service->get_employee_attendance($employee_id);
        } catch (\Exception $ex) {
            //throw $th;
            return response()->json(['message'=>$ex->getMessage()]);
        }
       return response()->json(['attendances_info'=>$attendances]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
