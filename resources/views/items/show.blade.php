@extends( 'items.base' )

@section( 'content' )


    <div class="row">
        <h2>Ver item</h2>
    </div>
    <div class="row">

        <div class="col-12">
            <p class="lead">
              {{ $item->first_field }}
            </p>
        </div>

        <div class="col-12">
            <p>
              {{ $item->second_field }}
            </p>
        </div>

    </div>

@endsection