<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use App\Models\CurriculumSemester;
use App\Models\Subject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects=Subject::all();
        return view('dashboard.subject.index',['subjects'=>$subjects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $areas = Areas::all();
        $curriculumsSemester = curriculumSemester::all();
        return view('dashboard.subject.create',['areas'=>$areas, 'curriculumsSemester'=>$curriculumsSemester]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $subject=new subject();
        $subject->subject_name=$request->input('subject_name');
        $subject->subject_credits=$request->input('subjects_credit');
        $subject->id_curriculum_semester=$request->input('id_curriculum_semester');
        $subject->id_area=$request->input('id_area');
        $subject->subject_code=$request->input('subject_code');
        $subject->save();
        return redirect()->route('subject.index')->with('success', 'subject created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //dd($program->id); 
        // Utiliza el método `findOrFail` para obtener el programa por su ID
        $subject = Subject::with('area', 'CurriculumSemester')->findOrFail($subject->id);

        // Devuelve la vista `show` con los datos del programa
        return view('dashboard.subject.show', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $area = Area::all();
        $curriculumSemester = CurriculumSemester::all();
        $subject=Subject::find($id);
        return view('dashboard.subject.edit',['area'=>$area, 'curriculumSemester'=>$curriculumSemester,'subject'=>$subject ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'id_area' => 'required|exists:area,id',
            'id_curriculum_semester' => 'required|exists:semester_number,id',
            'subject_name' => 'required|max:100',
            'subject_credits' => 'required|max:100',
            'subject_code' => 'required|max:100',

        ]);

        $subject->update([
            'id_area' => $request->id_area,
            'id_curriculum_semester' => $request->id_curriculum_semester,
            'subject_name' => $request->subject_name,
            'subject_credits' => $request->subject_credits,
            'subject_code' => $request->subject_code,
        ]);

        return redirect()->route('subject.index')->with('success', 'Subject updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $subject = Subject::find($id);
        $subject->delete();
        return redirect("dashboard/subject");
    }
}
