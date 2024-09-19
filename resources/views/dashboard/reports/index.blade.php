<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Informe Programaciones') }}
        </h2>
    </x-slot>
    <div class="container">
           
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID Grupo</th>
                    <th>Código del Grupo</th>
                    <th>Materia</th>
                    <th>Docente</th>
                    <th>Programación</th>
                </tr>
            </thead>
            <tbody>
                @foreach($groups as $group)
                    <tr>
                        <td>{{ $group->id }}</td>
                        <td>{{ $group->group_code }}</td>
                        <td>{{ $group->semesterSubject->subject->name_subject }}</td>
                        <td>{{ $group->teacher->name }} {{ $group->teacher->last_name }}</td>
                        <td>
                            @foreach($group->schedules as $schedule)
                                <p>{{ $schedule->day_of_week }}: {{ $schedule->start_time }} - {{ $schedule->end_time }} ({{ $schedule->type }})</p>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>