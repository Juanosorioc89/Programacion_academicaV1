<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Faculties;
use App\Models\ProgramType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs=Program::all();
        return view('dashboard.program.index',['programs'=>$programs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $faculties = Faculties::all();
        $programType = ProgramType::all();
        return view('dashboard.program.create',['faculties'=>$faculties, 'programTypes'=>$programType]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $program=new program();
        $program->id_faculty=$request->input('id_faculty');
        $program->id_program_type=$request->input('id_program_type');
        $program->name_program=$request->input('name_program');
        $program->program_code=$request->input('program_code');
        $program->save();
        return redirect()->route('program.index')->with('success', 'Program created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        //dd($program->id); 
        // Utiliza el método `findOrFail` para obtener el programa por su ID
        $program = Program::with('faculty', 'programType')->findOrFail($program->id);

        // Devuelve la vista `show` con los datos del programa
        return view('dashboard.program.show', compact('program'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $faculties = Faculties::all();
        $programType = ProgramType::all();
        $program=Program::find($id);
        return view('dashboard.program.edit',['faculties'=>$faculties, 'programTypes'=>$programType,'program'=>$program ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Program $program)
    {
        $request->validate([
            'id_faculty' => 'required|exists:faculties,id',
            'id_program_type' => 'required|exists:program_types,id',
            'name_program' => 'required|max:100',
            'program_code' => 'required|max:100',
        ]);

        $program->update([
            'id_faculty' => $request->id_faculty,
            'id_program_type' => $request->id_program_type,
            'name_program' => $request->name_program,
            'program_code' => $request->program_code,
        ]);

        return redirect()->route('program.index')->with('success', 'Program updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $program = Program::find($id);
        $program->delete();
        return redirect("dashboard/program");
    }
}
