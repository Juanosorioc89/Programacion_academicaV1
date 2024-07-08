@extends('dashboard.master')
@section('titulo','Programa')
@include('layouts/navigation')
@section('contenido')
<div class="container mt-5">
    <h1 class="mb-4">Program Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $program->name_program }}</h5>
            <p class="card-text"><strong>Faculty:</strong> {{ $program->faculty->name }}</p>
            <p class="card-text"><strong>Program Type:</strong> {{ $program->programType->name }}</p>
            <p class="card-text"><strong>Program Code:</strong> {{ $program->program_code }}</p>
            <a href="{{ route('programs.edit', $program->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('programs.destroy', $program->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <a href="{{ route('programs.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
