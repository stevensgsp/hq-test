@if ( $errors->isEmpty() === false )
    <div class="row">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <p>Error!</p>
            <ul>
                @foreach ( $errors->all() as $message )
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
@endif
