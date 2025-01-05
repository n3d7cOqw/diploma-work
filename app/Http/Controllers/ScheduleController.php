<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Models\Classroom;
use App\Models\Schedule;
use App\Models\StudentGroup;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use function PHPSTORM_META\map;


class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = \App\Models\StudentGroup::find(1)->schedules;
        $groups = StudentGroup::all();

        return view('admin.schedule.index', compact('schedules', 'groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $groups = StudentGroup::all();
        $subjects = Subject::all();
        $teachers = Teacher::all();
        $classrooms = Classroom::all();
        return view('admin.schedule.create')->with(compact('groups', 'subjects', 'teachers', 'classrooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreScheduleRequest $request)
    {
        $data = $request->validated();
        Schedule::create($data);

        return redirect()->route('admin.schedule.index')->with('success', 'Розклад успішно оновлено!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        $groups = StudentGroup::all();
        $subjects = Subject::all();
        $teachers = Teacher::all();
        $classrooms = Classroom::all();
        return view('admin.schedule.edit')->with(compact('schedule', 'groups', 'subjects', 'teachers', 'classrooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateScheduleRequest $request, Schedule $schedule)
    {
        $data = $request->validated();
        $schedule->update($data);
        return redirect()->route('admin.schedule.index')->with('success', 'Даны про пару успішно оновлено');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        try {
            $schedule->delete();
            return redirect()->route('admin.schedule.index')->with('success', 'Дані про розклад успішно видалено!');
        }catch (\Exception $exception){
            return redirect()->route('admin.schedule.index')->with('error', $exception->getMessage());
        }
    }

    public function selectSchedule(Request $request)
    {


        $group = \App\Models\StudentGroup::find($request->input('group_id'));
        $schedules = $group->schedules->map(function ($schedule) {
            return $schedule->toArray();
        });
        $schedules =  $schedules->toArray();
        $schedules = array_map(function ($schedule) {
            $schedule['group']['abbreviated_name'] = StudentGroup::find($schedule['group_id'])->abbreviated_name;
            $schedule['classroom']['number'] = Classroom::find($schedule['classroom_id'])->number;
            $schedule['teacher']['name'] = Teacher::find($schedule['teacher_id'])->first_name;
            $schedule['teacher']['lastname'] = Teacher::find($schedule['teacher_id'])->last_name;
            $schedule['subject']['name'] = Subject::find($schedule['subject_id'])->name;
            return $schedule;
        }, $schedules);

        usort($schedules, function ($a, $b) {
            $daysOfWeek = [
                'Monday'    => 1,
                'Tuesday'   => 2,
                'Wednesday' => 3,
                'Thursday'  => 4,
                'Friday'    => 5,
                'Saturday'  => 6,
                'Sunday'    => 7,
            ];
            // First, compare by day of the week
            if ($daysOfWeek[$a['day_of_week']] === $daysOfWeek[$b['day_of_week']]) {
                // If days are the same, compare by time
                return strcmp($a['start_time'], $b['start_time']);
            }
            // Otherwise, compare by day of the week
            return $daysOfWeek[$a['day_of_week']] === $daysOfWeek[$b['day_of_week']];
        });


        return response()->json($schedules);


    }
}
