@extends( 'app' )

@section( 'base' )

<div class="row">
    <h2>Items</h2>
</div>

<div class="row">
    <a href="{{ route( 'items.create' ) }}" class="btn btn-success btn-xs">Crear nuevo</a>
</div>

<div class="row">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First field</th>
                    <th scope="col">Second field</th>

                    <th scope="col" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $items as $item )
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->first_field }}</td>
                        <td>{{ Str::limit( $item->second_field, 50 ) }}</td>

                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{ route( 'items.show', [ $item->id ] ) }}" class="btn btn-info btn-xs">Ver</a>
                                <a href="{{ route( 'items.edit', [ $item->id ] ) }}" class="btn btn-primary btn-xs">Actualizar</a>
                                <button type="submit" class="btn btn-danger btn-xs" form="delete-{{ $item->id }}">Eliminar</button>
                            </div>
                            <form method="post" action="{{ route( 'items.destroy', [ $item->id ] ) }}" id="delete-{{ $item->id }}">
                                {{ csrf_field() }}
                                {{ method_field( 'DELETE' ) }}
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection