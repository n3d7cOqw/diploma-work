<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCuratorRequest;
use App\Http\Requests\UpdateCuratorRequest;
use App\Models\Curator;
use App\Models\StudentGroup;

class CuratorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $curators = Curator::all();
        $groups = StudentGroup::all();
        return view('admin.curator.index', compact('curators', 'groups'));
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
    public function store(StoreCuratorRequest $request)
    {

        $curator = new Curator();
        $curator::create($request->all());

        return redirect()->route('admin.curator.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Curator $curator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curator $curator)
    {
        $groups = StudentGroup::all();
        return view('admin.curator.edit', compact('curator', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCuratorRequest $request, Curator $curator)
    {
        $curator->update($request->all());
        return redirect()->route('admin.curator.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curator $curator)
    {
        try {
            $curator->delete();
            return redirect()->route('admin.curator.index')->with('success', 'Дані про куратора успішно видалено!');
        }catch (\Exception $exception){
            return redirect()->route('admin.curator.index')->with('error', $exception->getMessage());
        }
    }
}
