@extends('dashboard.master')
@section('titulo','Asignaturas por semestre')
@include('layouts/navigation')
@section('contenido')
<div class="card">
    <div class="card-header">
        Detalles de asignaturas por semestre
    </div>
    <div class="card-body">
        <p><strong>Id Asignatura:</strong> {{ $semestersSubject->subject->id }}</p>
        <p><strong>Id bloque:</strong> {{ $semestersSubject->block->id }}</p>
        <p><strong>Número de estudiantes:</strong> {{ $semestersSubject->students_number }}</p>
        <p><strong>Fecha de Creación:</strong> {{ $semestersSubject->created_at->format('d/m/Y H:i:s') }}</p>
        <p><strong>Última Actualización:</strong> {{ $semestersSubject->updated_at->format('d/m/Y H:i:s') }}</p>
    </div>
    <div class="card-footer">
        <a href="{{ route('semesterSubject.index') }}" class="btn btn-primary">Volver</a>
    </div>
</div>
@endsection