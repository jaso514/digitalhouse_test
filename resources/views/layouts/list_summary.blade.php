@if ($pagination)
<div class="row">
    @if ($pagination->count()>0)
        {{ $pagination->count() . " de " . $pagination->total() . " registros" }}
    @else
    No hay resultados
    @endif
</div>
@endif