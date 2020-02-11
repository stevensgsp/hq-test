@component('mail::message')
# Item editado

Item actualizado con id: {{ $item->id }}

@component( 'mail::button', [ 'url' => route( 'items.show', [ $item->id ] ) ] )
Ver item
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
