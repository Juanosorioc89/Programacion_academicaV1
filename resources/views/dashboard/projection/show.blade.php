<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Proyeciones Registradas') }}
        </h2>
    </x-slot>
    <div class="container">
        <h1>Detalles de la Proyección</h1>
        
        <div class="card">
            <div class="card-header">
                Proyección ID: {{ $projection->id }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Programa: {{ $projection->curriculum->program->name_program }}</h5>
                <p class="card-text"><strong>Currículum ID:</strong> {{ $projection->curriculum_id }}</p>
                <p class="card-text"><strong>Semestre:</strong> {{ $projection->semester }}</p>
                <p class="card-text"><strong>Año:</strong> {{ $projection->year }}</p>
                <p class="card-text"><strong>Semestre Académico:</strong> {{ $projection->academic_semester }}</p>
                <p class="card-text"><strong>Estudiantes Proyectados:</strong> {{ $projection->projected_students }}</p>
            </div>
        </div>
        
        <a href="{{ route('projection.index') }}" class="btn btn-secondary mt-3">Volver al listado</a>
    </div>
</x-app-layout>