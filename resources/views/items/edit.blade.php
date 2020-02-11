@extends( 'items.base' )

@section( 'content' )


    <div class="row">
        <h2>Actualizar item</h2>
    </div>
    <div class="row">

        <form action="{{ route( 'items.update', [ $item->id ] ) }}" method="post">
            {{ method_field( 'PUT' ) }}
            @include( 'items.fields' )
        </form>

    </div>

@endsection