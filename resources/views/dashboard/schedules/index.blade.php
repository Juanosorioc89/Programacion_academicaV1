<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Horarios de Grupos') }}
        </h2>
    </x-slot>
    <div class="container">
        <h1>Horarios de Grupos</h1>
        <a href="{{ route('schedules.create') }}" class="btn btn-primary mb-3">Agregar Horario</a>
    
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Grupo</th>
                    <th>Día de la Semana</th>
                    <th>Hora de Inicio</th>
                    <th>Hora de Fin</th>
                    <th>Tipo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($schedules as $schedule)
                    <tr>
                        <td>{{ $schedule->id }}</td>
                        <td>{{ $schedule->group->group_code }}</td>
                        <td>{{ $schedule->day_of_week }}</td>
                        <td>{{ $schedule->start_time }}</td>
                        <td>{{ $schedule->end_time }}</td>
                        <td>{{ $schedule->type }}</td>
                        <td>
                            <a href="{{ route('schedules.edit', $schedule->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este horario?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    
        {{ $schedules->links() }}
    </div>
</x-app-layout>