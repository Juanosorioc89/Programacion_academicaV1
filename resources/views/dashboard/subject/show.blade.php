@extends('dashboard.master')
@section('titulo','Programa')
@include('layouts/navigation')
@section('contenido')
<div class="card">
    <div class="card-header">
        Detalles de la asignatura
    </div>
    <div class="card-body">
        <p><strong>Nombre de la asignatura:</strong> {{ $subject->name_subject }}</p>
        <p><strong>Código de la asignatura:</strong> {{ $subject->subject_code }}</p>
        <p><strong>Area:</strong> {{ $subject->area->description_area }}</p>
        <p><strong>Número de semestre:</strong> {{ $subject->curriculumSemester->semester_number }}</p>
        <p><strong>Número de créditos:</strong> {{ $subject->subject_credit }}</p>
        <p><strong>Fecha de Creación:</strong> {{ $subject->created_at->format('d/m/Y H:i:s') }}</p>
        <p><strong>Última Actualización:</strong> {{ $subject->updated_at->format('d/m/Y H:i:s') }}</p>
    </div>
    <div class="card-footer">
        <a href="{{ route('program.index') }}" class="btn btn-primary">Volver</a>
    </div>
</div>
@endsection
