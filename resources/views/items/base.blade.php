@extends( 'app' )

@section( 'base' )

    @yield( 'content' )

    <div class="row">
        <a href="{{ route( 'items.index' ) }}" class="btn btn-secondary btn-xs">Volver</a>
    </div>

@endsection