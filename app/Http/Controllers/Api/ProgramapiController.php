<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProgramType;
use App\Models\CurriculumSemester;
use App\Models\Program;
class ProgramapiController extends Controller
{

    public function getCurriculumSemesters($programId)
    {
        $curriculumSemesters = CurriculumSemester::select('curriculum_semesters.*')
            ->join('curriculums', 'curriculum_semesters.id_curriculum', '=', 'curriculums.id')
            ->where('curriculums.id_academic_program', $programId)
            ->get();
        return response()->json($curriculumSemesters);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
