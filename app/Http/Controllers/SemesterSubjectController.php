<?php

namespace App\Http\Controllers;

use App\Models\SemesterSubject;
use App\Models\Subject;
use App\Models\Block;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SemesterSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $semestersSubject=SemesterSubject::all();
        return view('dashboard.semesterSubject.index',['semestersSubject'=>$semestersSubject]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subject = Subject::all();
        $block = Block::all();
        return view('dashboard.semesterSubject.create',['subject'=>$subject, 'block'=>$block]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $semestersSubject=SemesterSubject::all();
        $semestersSubject->id_subject=$request->input('id_subject');
        $semestersSubject->id_block=$request->input('id_block');
        $semestersSubject->number_students=$request->input('students_number');
        $semestersSubject->save();
        return redirect()->route('semesterSubject.index')->with('success', 'Program created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SemesterSubject $semestersSubject)
    {
        //dd($program->id); 
        // Utiliza el método `findOrFail` para obtener el programa por su ID
        $semestersSubject=SemesterSubject::all()::with('subject', 'block')->findOrFail($semestersSubject->id);

        // Devuelve la vista `show` con los datos del programa
        return view('dashboard.semesterSubject.show', compact('semesterSubject'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $subject = Subject::all();
        $block = Block::all();
        $semestersSubject=SemesterSubject::find($id);
        return view('dashboard.semesterSubject',['subject'=>$subject, 'block'=>$block,'semestersSubject'=>$semestersSubject ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SemesterSubject $semesterSubject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SemesterSubject $semesterSubject)
    {
        //
    }
}
