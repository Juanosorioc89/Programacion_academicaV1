<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear nueva Proyecion') }}
        </h2>
    </x-slot>
    <div class="container">
        
    
        <form action="{{ route('projection.store') }}" method="POST">
            @csrf
    
            <div class="mb-3">
                <label for="program_id" class="form-label">Seleccione el Programa</label>
                <select id="program_id" name="program_id" class="form-control" onchange="loadSemesters()">
                    <option value="">Seleccione un programa</option>
                    @foreach ($programs as $program)
                        <option value="{{ $program->id }}">{{ $program->name_program }}</option>
                    @endforeach
                </select>
            </div>
    
            <div id="semestersContainer" class="mb-3">
                <!-- Los semestres se cargarán aquí dinámicamente -->
            </div>
    
            <div class="mb-3">
                <label for="year" class="form-label">Año</label>
                <select id="year" name="year" class="form-control" required>
                    @for ($year = 2020; $year <= 2050; $year++)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endfor
                </select>
            </div>
    
            <div class="mb-3">
                <label for="academic_semester" class="form-label">Semestre Académico</label>
                <select id="academic_semester" name="academic_semester" class="form-control" required>
                    <option value="1">Primer Semestre</option>
                    <option value="2">Segundo Semestre</option>
                </select>
            </div>
    
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Guardar Proyección</button>
            </div>
        </form>
    </div>
    
    <script>
        function loadSemesters() {
            const programId = document.getElementById('program_id').value;
            if (!programId) {
                document.getElementById('semestersContainer').innerHTML = ''; // Limpia el contenedor si no se selecciona un programa
                return; // No hacer nada si no se ha seleccionado un programa
            }
    
            fetch(`/dashboard/load-semesters/${programId}`, {
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
            })
            .then(response => response.json())
            .then(semesters => {
                const container = document.getElementById('semestersContainer');
                container.innerHTML = ''; // Limpiar el contenedor
    
                semesters.forEach(semester => {
                    container.innerHTML += `
                        <div class="mb-3">
                            <label>Semestre ${semester.semester_number}</label>
                            <input type="hidden" name="semesters[${semester.id}][semester_number]" value="${semester.semester_number}">
                            <input type="number" name="semesters[${semester.id}][projected_students]" class="form-control" placeholder="Estudiantes Proyectados">
                        </div>
                    `;
                });
            })
            .catch(error => console.error('Error loading the semesters:', error));
        }
    </script>

</x-app-layout>