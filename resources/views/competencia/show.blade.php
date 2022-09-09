<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h5 class="card-header">Competencia #{{ $competencia->id }} <span
                            class="badge bg-{{ $competencia->activo ? 'success' : 'secondary' }}">{{ $competencia->activo ? 'Activo' : 'Inactivo' }}</span>
                        </h1>
                    </h5>
                    <div class="card-body">
                        <h5 class="card-title fs-4 fw-semibold">Descripcion</h5>
                        <p class="card-text">{{ $competencia->descripcion }}</p>
                        <div class="mt-2">
                            <a href="{{ route('competencias.edit', $competencia->id) }}"
                                class="btn btn-primary">Editar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
