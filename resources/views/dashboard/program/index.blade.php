@extends('dashboard.master')
@section('titulo','Programa')
@include('layouts/navigation')
@section('contenido')
<div class="container mt-5">
    <h1 class="mb-4">Programs</h1>
    <a href="{{ url('dashboard/program/create')}}">Nuevo programa</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Faculty</th>
                <th>Program Type</th>
                <th>Name</th>
                <th>Code</th>
            </tr>
        </thead>
        <tbody>
            @foreach($programs as $program)
            <tr>
                <td>{{ $program->id }}</td>
                <td>{{ $program->faculty->name_program }}</td>
                <td>{{ $program->programType->name_program_type }}</td>
                <td>{{ $program->name_program }}</td>
                <td>{{ $program->program_code }}</td>
                <td>
                    <a href="{{ url('dashboard/program/show/'.$program->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ url('dashboard/program/edit/'.$program->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ url('dashboard/program/'.$program->id) }}" method="post" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>

@endsection

