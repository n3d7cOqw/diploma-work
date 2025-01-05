<?php

namespace App\Http\Controllers;

use App\Models\Curator;
use App\Models\StudentGroup;
use Illuminate\Http\Request;

class StudentGroupController extends Controller
{
    public function index(){
        $studentGroups = StudentGroup::all();
        return view('student-group.index', compact('studentGroups'));
    }

    public function create(){}

    public function store(Request $request){

        $data = $request->validate([
            'name' => 'required',
            'abbreviated_name' => 'required',
            'curator_id' =>''
        ]);

        $studentGroup = new StudentGroup();

        $studentGroup::create($data);

        return redirect()->route('admin.student-group.index');

    }
    public function show(StudentGroup $studentGroup){

    }
    public function edit($id)
    {
        $group = StudentGroup::findOrFail($id);
        $curators = Curator::all();

        return view('student-group.edit', compact('group', 'curators'));
    }

    public function update(Request $request, StudentGroup $studentGroup){

    }
    public function destroy($id)
    {
        try {
            // Найти группу по ID
            $group = StudentGroup::findOrFail($id);

            // Удалить группу
            $group->delete();

            return redirect()->route('admin.student-group.index')->with('success', 'Групу успішно видалено.');
        } catch (\Exception $e) {
            return redirect()->route('admin.student-group.index')->with('error', 'Сталася помилка при видаленні групи.');
        }
    }
}
