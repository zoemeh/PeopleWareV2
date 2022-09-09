<div class="card">
    <div class="card-header">{{ __('Idioma') }}</div>
    <div class="card-body">
        <form method="POST" action="{{ $idioma->id ? route('idiomas.update', $idioma->id) : route('idiomas.store') }}">
            @if ($idioma->id)
                @method('PUT')
            @endif
            @csrf
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion"
                    value="{{ $idioma->descripcion }}">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="activo" name="activo"
                    {{ $idioma->activo ? 'checked' : '' }}>
                <label class="form-check-label" for="activo">Estado</label>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
