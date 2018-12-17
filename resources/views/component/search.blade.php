<form action="{{ $submitUrl }}" id="form" class="form-inline justify-content-center">
    <div class="input-group">
        <label for="titulo" class="sr-only">Buscar</label>&nbsp;
        @foreach ($fields as $key => $field)
        <input type="text" name="{{ $key }}" id="{{ $key }}" value="{{ $field['value'] }}"
               placeholder="{{ $field['title'] }}" class="form-control mr-sm-2">
        @endforeach
        <button type="submit" class="btn btn-primary mb-2">
            <i class="fas fa-search"></i>
        </button>
        @if (isset($clean) && $clean)
        <div class="col-12 text-right">
            <a href="{{ $clean_route }}">
                <small>Limpiar filtro</small>
            </a>
        </div>
        @endif
    </div>
</form>