<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex">
                        <span class="p-2 d-inline flex-grow-1">{{ __('Idiomas') }}</span>
                        <a href="{{ route('idiomas.create') }}" class="p-2 btn btn-primary">Crear</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Activo</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($idiomas as $idioma)
                                    <tr>
                                        <th scope="row">{{ $idioma->id }}</th>
                                        <td>{{ $idioma->descripcion }}</td>
                                        <td>{{ $idioma->activo }}</td>
                                        <td>

                                            <form class="d-inline"
                                                action="{{ route('idiomas.destroy', $idioma->id) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <div class="btn-group" role="group">
                                                    <a type="button" class="btn btn-primary"
                                                        href="{{ route('idiomas.edit', $idioma->id) }}">Editar</a>
                                                    <button class="btn btn-danger" type="submit">Borrar</button>
                                                </div>

                                            </form>
                                        </td>
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
