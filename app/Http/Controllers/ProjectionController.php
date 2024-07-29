<?php

namespace App\Http\Controllers;
use App\Models\Program;
use App\Models\CurriculumSemester;
use App\Models\Projection;
use Illuminate\Http\Request;

class ProjectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projections = Projection::with('curriculum.program') // Asegúrate de que esta relación exista en el modelo Projection
                              ->orderByDesc('created_at')
                              ->paginate(10); // Cambia el número según cuántos elementos quieras por página

    return view('dashboard.projection.index', compact('projections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programs = Program::all();
        return view('dashboard.projection.create', compact('programs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'program_id' => 'required|exists:programs,id',
            'year' => 'required|integer',
            'academic_semester' => 'required|integer',
            'semesters' => 'required|array',
            'semesters.*.semester_number' => 'required|integer',
            'semesters.*.projected_students' => 'required|integer',
        ]);
    
        foreach ($data['semesters'] as $curriculumSemesterId => $semesterData) {
            $curriculumSemester = CurriculumSemester::findOrFail($curriculumSemesterId);
            $curriculumId = $curriculumSemester->id_curriculum;
    
            Projection::create([
                'curriculum_id' => $curriculumId,
                'semester' => $semesterData['semester_number'],
                'projected_students' => $semesterData['projected_students'],
                'year' => $data['year'],
                'academic_semester' => $data['academic_semester']
            ]);
        }
    
        return redirect()->route('projection.index')->with('success', 'Proyecciones creadas con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $projection=Projection::findOrFail($id);
        return view('dashboard.projection.show', compact('projection'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $projection = Projection::with(['curriculum', 'curriculum.program'])->findOrFail($id);
    $programs = Program::all();
    $semester = CurriculumSemester::findOrFail($projection->semester); 
    return view('dashboard.projection.edit', compact('projection', 'programs', 'semester'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'year' => 'required|integer',
            'academic_semester' => 'required|integer',
            'semesters' => 'required|array',
            'semesters.*.semester_number' => 'required|integer',
            'semesters.*.projected_students' => 'required|integer',
        ]);
    
        $projection = Projection::findOrFail($id);
    
        foreach ($data['semesters'] as $curriculumSemesterId => $semesterData) {
            $curriculumSemester = CurriculumSemester::findOrFail($curriculumSemesterId);
            $curriculumId = $curriculumSemester->id_curriculum;
    
            $projection->update([
                'curriculum_id' => $curriculumId,
                'semester' => $semesterData['semester_number'],
                'projected_students' => $semesterData['projected_students'],
                'year' => $data['year'],
                'academic_semester' => $data['academic_semester']
            ]);
        }
    
        return redirect()->route('projection.index')->with('success', 'Proyección actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $projection=Projection::findOrFail($id);
        $projection->delete();
        return redirect()->route('projection.index')->with('success', 'Proyección eliminada exitosamente.');
    }

    public function loadSemesters($programId)
{
    try {
        $semesters = CurriculumSemester::join('curriculums', 'curriculum_semesters.id_curriculum', '=', 'curriculums.id')
                                       ->where('curriculums.id_academic_program', $programId)
                                       ->get(['curriculum_semesters.*']); // Asegúrate de seleccionar solo las columnas de curriculum_semesters

        return response()->json($semesters);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}
}
