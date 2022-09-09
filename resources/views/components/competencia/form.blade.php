<div class="card">
    <div class="card-header">{{ __('Competencia') }}</div>
    <div class="card-body">
        <form method="POST" action="{{ $competencia->id ? route('competencias.update', $competencia->id) : route('competencias.store') }}">
            @if ($competencia->id)
                @method('PUT')
            @endif
            @csrf
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion"
                    value="{{ $competencia->descripcion }}">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="activo" name="activo"
                    {{ $competencia->activo ? 'checked' : '' }}>
                <label class="form-check-label" for="activo">Estado</label>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
