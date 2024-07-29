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
        $semestersSubject= new SemesterSubject();
        $semestersSubject->id_subject=$request->input('id_subject');
        $semestersSubject->id_block=$request->input('id_block');
        $semestersSubject->students_number=$request->input('students_number');
        $semestersSubject->save();
        return redirect()->route('semesterSubject.index')->with('success', 'Program created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
        // Utiliza el método `findOrFail` para obtener el programa por su ID
        $semestersSubject=SemesterSubject::with('subject', 'block')->findOrFail($id);
        // Devuelve la vista `show` con los datos del programa
        return view('dashboard.semesterSubject.show', compact('semestersSubject'));
        //  return view('dashboard.teacher.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $subject = Subject::all();
        $block = Block::all();
        $semestersSubject=SemesterSubject::find($id);
        return view('dashboard.semesterSubject.edit',['subject'=>$subject, 'block'=>$block,'semestersSubject'=>$semestersSubject ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_subject' => 'required|exists:subjects,id',
            'id_block' => 'required|exists:blocks,id',
            'students_number' => 'required|integer',
        ]);

        // Buscar el registro con el ID especificado
        $semesterSubject = SemesterSubject::findOrFail($id);

        // Actualizar los datos del registro
        $semesterSubject->id_subject = $request->input('id_subject');
        $semesterSubject->id_block = $request->input('id_block');
        $semesterSubject->students_number = $request->input('students_number');
        $semesterSubject->save();

        // Redirigir a la página de índice con un mensaje de éxito
        return redirect()->route('semesterSubject.index')->with('success', 'Program updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SemesterSubject $semesterSubject)
    {
        //
    }
}
