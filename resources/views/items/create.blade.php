@extends( 'items.base' )

@section( 'content' )


    <div class="row">
        <h2>Crear item</h2>
    </div>
    <div class="row">

        <form action="{{ route( 'items.store' ) }}" method="post">
            @include( 'items.fields' )
        </form>

    </div>

@endsection