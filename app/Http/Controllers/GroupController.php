<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Projection;
use App\Models\CurriculumSemester;
use App\Models\SemesterSubject;
use App\Models\Group;
use App\Models\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::with('semesterSubject', 'teacher')->paginate(10);
        $programs = Program::all(); // Agregar la obtención de los programas
        return view('dashboard.group.index', compact('groups', 'programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $semesterSubjects = SemesterSubject::with('subject')->get();
        $teachers = Teacher::all();
        return view('dashboard.group.create', compact('semesterSubjects', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'group_code' => 'required|string|max:100',
            'id_semester_subject' => 'required|exists:semester_subjects,id',
            'id_teacher' => 'nullable|exists:teachers,id',
        ]);

        Group::create($request->all());

        return redirect()->route('group.index')->with('success', 'Grupo creado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        //
    }
    public function autoGenerate(Request $request)
    {
        $request->validate([
            'program_id' => 'required|exists:programs,id',
            'year' => 'required|integer',
            'academic_semester' => 'required|integer',
        ]);

        $programId = $request->input('program_id');
        $year = $request->input('year');
        $academicSemester = $request->input('academic_semester');

        $projections = Projection::whereHas('curriculum', function ($query) use ($programId) {
            $query->where('id_academic_program', $programId);
        })->where('year', $year)->where('academic_semester', $academicSemester)->get();

        foreach ($projections as $projection) {
            $semesterSubjects = SemesterSubject::where('id_curriculum', $projection->curriculum_id)->get();

            foreach ($semesterSubjects as $semesterSubject) {
                $studentsPerGroup = 40;
                $totalStudents = $projection->projected_students;
                $numGroups = ceil($totalStudents / $studentsPerGroup);

                for ($i = 0; $i < $numGroups; $i++) {
                    Group::create([
                        'group_code' => $semesterSubject->id . '-' . ($i + 1),
                        'id_semester_subject' => $semesterSubject->id,
                        'id_teacher' => null,
                    ]);
                }
            }
        }

        return redirect()->route('group .index')->with('success', 'Grupos generados automáticamente con éxito.');
    }
}
