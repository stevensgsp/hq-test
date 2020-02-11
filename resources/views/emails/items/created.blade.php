@component('mail::message')
# Item creado

Nuevo item creado con id: {{ $item->id }}

@component( 'mail::button', [ 'url' => route( 'items.show', [ $item->id ] ) ] )
Ver item
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
