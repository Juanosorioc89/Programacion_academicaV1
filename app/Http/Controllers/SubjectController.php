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
        $subject->id_area=$request->input('id_area');
        $subject->id_curriculum_semester=$request->input('id_curriculum_semester');
        $subject->name_subject=$request->input('subject_name');
        $subject->subject_credit=$request->input('subject_credit');
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
        $area = Areas::all();
        $curriculumSemester = CurriculumSemester::all();
        $subject=Subject::find($id);
        return view('dashboard.subject.edit',['area'=>$area, 'curriculumSemester'=>$curriculumSemester,'subject'=>$subject ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_area' => 'required|exists:areas,id',
            'id_curriculum_semester' => 'required|exists:curriculum_semesters,id',
            'name_subject' => 'required|max:100',
            'subject_credit' => 'required|max:100',
            'subject_code' => 'required|max:100',

        ]);
        $subject = Subject::findOrFail($id);
        $subject->update($request->all());

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
