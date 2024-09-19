<?php

namespace App\Http\Controllers;
use App\Models\Group;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        // Obtener todos los grupos con sus relaciones
        $groups = Group::with(['semesterSubject.subject', 'teacher', 'schedules'])->get();

        // Pasar los datos a la vista
        return view('dashboard.reports.index', compact('groups'));
    }
}
