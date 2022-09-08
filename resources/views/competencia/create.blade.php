<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Competencias') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('competencias.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripcion</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="activo" name="activo">
                                <label class="form-check-label" for="activo">Estado</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
