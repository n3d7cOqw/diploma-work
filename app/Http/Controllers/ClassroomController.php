<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClassroomRequest;
use App\Http\Requests\UpdateClassroomRequest;
use App\Models\Classroom;
use App\Models\Teacher;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classrooms = Classroom::all();
        return view('admin.classroom.index', compact('classrooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = Teacher::all();
        return view('admin.classroom.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClassroomRequest $request)
    {
        $data = $request->validated();
        Classroom::create($data);
        return redirect()->route('admin.classroom.index')->with('success', 'Аудиторії успішно додано!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom $classroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classroom $classroom)
    {

        $teachers = Teacher::all();
        return view('admin.classroom.edit', compact('classroom', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClassroomRequest $request, Classroom $classroom)
    {
        $classroom->update($request->validated());
        return redirect()->route('admin.classroom.index')->with('success', 'Успішно оновлено дані про аудиторію ' . $classroom->first()->number);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $classroom)
    {
        try {
            $classroom->delete();
            return redirect()->route('admin.classroom.index')->with('success', 'Дані про аудиторії успішно видалено!');
        }catch (\Exception $exception){
            return redirect()->route('admin.classroom.index')->with('error', $exception->getMessage());
        }

    }
}
