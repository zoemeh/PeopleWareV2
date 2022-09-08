<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex">
                    <span class="p-2 d-inline flex-grow-1">{{ __('Competencias') }}</span>
                    <a href="{{ route('competencias.create') }}" class="p-2 btn btn-primary">Crear</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Activo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($competencias as $competencia)
                                    <tr>
                                        <th scope="row">{{ $competencia->id }}</th>
                                        <td>{{ $competencia->descripcion }}</td>
                                        <td>{{ $competencia->activo }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
