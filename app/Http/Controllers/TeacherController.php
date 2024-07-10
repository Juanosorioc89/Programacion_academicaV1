<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Type_Vinculation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers=Teacher::all();
        return view('dashboard.teacher.index',['teachers'=>$teachers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Type_Vinculation = Type_Vinculation::all();
        return view('dashboard.teacher.create',['TypeVinculation'=>$Type_Vinculation]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'document_type' => 'required|string|max:100',
            'id_number' => 'required|string|max:100',
            'personal_email' => 'required|email|max:100',
            'institutional_email' => 'required|email|max:100',
            'adress' => 'required|string|max:100',
            'phone_number' => 'required|string|max:100',
            'number_mobile' => 'required|string|max:100',
            'diplom' => 'required|boolean',
            'id_vinculation_type' => 'required|exists:type_vinculations,id',
        ]);

        Teacher::create($request->all());

        return redirect()->route('teacher.index')->with('success', 'Profesor creado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        // Utiliza el método `findOrFail` para obtener el programa por su ID
        $teacher = Teacher::with('type_vinculation')->findOrFail($teacher->id);
    

        // Devuelve la vista `show` con los datos del programa
        return view('dashboard.teacher.show', compact('teacher'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        $Type_Vinculation = Type_Vinculation::all();
        return view('dashboard.teacher.edit', compact('teacher', 'Type_Vinculation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'document_type' => 'required|string|max:100',
            'id_number' => 'required|string|max:100',
            'personal_email' => 'required|email|max:100',
            'institutional_email' => 'required|email|max:100',
            'adress' => 'required|string|max:100',
            'phone_number' => 'required|string|max:100',
            'number_mobile' => 'required|string|max:100',
            'diplom' => 'required|boolean',
            'id_vinculation_type' => 'required|exists:type_vinculations,id',
        ]);
    
        $teacher = Teacher::findOrFail($id);
        $teacher->update($request->all());
    
        return redirect()->route('teacher.show', $teacher->id)->with('success', 'Docente actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Buscar el docente por ID
        $teacher = Teacher::findOrFail($id);

        // Eliminar el docente
        $teacher->delete();

        // Redirigir a la lista de docentes con un mensaje de éxito
        return redirect()->route('teacher.index')->with('success', 'Docente eliminado correctamente');
    }
}
