@extends('dashboard.master')
@section('titulo','Programa')
@include('layouts/navigation')
@section('contenido')
<div class="card">
    <div class="card-header">
        Detalles del Programa
    </div>
    <div class="card-body">
        <p><strong>Nombre del Programa:</strong> {{ $program->name_program }}</p>
        <p><strong>Código del Programa:</strong> {{ $program->program_code }}</p>
        <p><strong>Facultad:</strong> {{ $program->faculty->name }}</p>
        <p><strong>Tipo de Programa:</strong> {{ $program->programType->name_program_type }}</p>
        <p><strong>Fecha de Creación:</strong> {{ $program->created_at->format('d/m/Y H:i:s') }}</p>
        <p><strong>Última Actualización:</strong> {{ $program->updated_at->format('d/m/Y H:i:s') }}</p>
    </div>
    <div class="card-footer">
        <a href="{{ route('program.index') }}" class="btn btn-primary">Volver</a>
    </div>
</div>
@endsection
