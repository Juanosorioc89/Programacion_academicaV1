<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agregar Horario') }}
        </h2>
    </x-slot>
    <div class="container">
            
        <form action="{{ route('schedules.store') }}" method="POST">
            @csrf
    
            <div class="mb-3">
                <label for="group_id" class="form-label">Grupo</label>
                <select id="group_id" name="group_id" class="form-control" required>
                    <option value="">Seleccione un grupo</option>
                    @foreach ($groups as $group)
                        <option value="{{ $group->id }}">{{ $group->group_code }}</option>
                    @endforeach
                </select>
            </div>
    
            <div class="mb-3">
                <label for="day_of_week" class="form-label">Día de la Semana</label>
                <select id="day_of_week" name="day_of_week" class="form-control" required>
                    <option value="">Seleccione un día</option>
                    <option value="Lunes">Lunes</option>
                    <option value="Martes">Martes</option>
                    <option value="Miércoles">Miércoles</option>
                    <option value="Jueves">Jueves</option>
                    <option value="Viernes">Viernes</option>
                    <option value="Sábado">Sábado</option>
                    <option value="Domingo">Domingo</option>
                </select>
            </div>
    
            <div class="mb-3">
                <label for="start_time" class="form-label">Hora de Inicio</label>
                <input type="time" name="start_time" id="start_time" class="form-control" required>
            </div>
    
            <div class="mb-3">
                <label for="end_time" class="form-label">Hora de Fin</label>
                <input type="time" name="end_time" id="end_time" class="form-control" required>
            </div>
    
            <div class="mb-3">
                <label for="type" class="form-label">Tipo de Encuentro</label>
                <select id="type" name="type" class="form-control" required>
                    <option value="">Seleccione un tipo</option>
                    <option value="Encuentro Sincrónico">Encuentro Sincrónico</option>
                    <option value="Encuentro AAA">Encuentro AAA</option>
                </select>
            </div>
    
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Crear Horario</button>
                <a href="{{ route('schedules.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</x-app-layout>