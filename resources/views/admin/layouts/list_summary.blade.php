@if ($pagination)
<div class="row">
    <div class="col-6">
    @if ($pagination->count()>0)
        {{ $pagination->count() . " de " . $pagination->total() . " registros" }}
    @else
    No hay resultados
    @endif
    </div>
</div>
@endif