<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItem;
use App\Http\Requests\UpdateItem;
use App\Mail\ItemCreated;
use App\Mail\ItemEdited;
use App\Repositories\ItemRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Mail;

/**
 * Class ItemsController
 * @package App\Http\Controllers
*/
class ItemsController extends Controller
{
    /**
     * @var  ItemRepository
     */
    private $itemRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct( ItemRepository $itemRepo )
    {
        $this->itemRepository = $itemRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = $this->itemRepository->all();

        return view( 'items.index' )->with( 'items', $items );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'items.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreItem  $request
     * @return \Illuminate\Http\Response
     */
    public function store( StoreItem $request )
    {
        // input
        $input = $request->only( 'first_field', 'second_field' );

        $item = $this->itemRepository->create( $input );

        Mail::to( 'steven.gsp@gmail.com' )
            ->queue( new ItemCreated( $item ) );

        return redirect( route( 'items.index' ) )->with( 'message', 'Item creado exitosamente.' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        $item = $this->itemRepository->find( $id );

        if ( empty( $item ) === true ) {
            return redirect( route( 'items.index' ) )->with( 'message', 'Item no existe.' );
        }

        return view( 'items.show' )->with( 'item', $item );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {
        $item = $this->itemRepository->find( $id );

        if ( empty( $item ) === true ) {
            return redirect( route( 'items.index' ) )->with( 'message', 'Item no existe.' );
        }

        return view( 'items.edit' )->with( 'item', $item );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateItem  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( UpdateItem $request, $id )
    {
        // input
        $input = $request->only( 'first_field', 'second_field' );

        try {
            $item = $this->itemRepository->update( $input, $id );
        }
        catch ( ModelNotFoundException $e ) {
            return redirect( route( 'items.index' ) )->with( 'message', 'Item no existe.' );
        }

        Mail::to( 'steven.gsp@gmail.com' )
            ->queue( new ItemEdited( $item ) );

        return redirect( route( 'items.index' ) )->with( 'message', 'Item actualizado exitosamente.' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        $item = $this->itemRepository->find( $id );

        if ( empty( $item ) === true ) {
            return redirect( route( 'items.index' ) )->with( 'message', 'Item no existe.' );
        }

        $item = $this->itemRepository->delete( $id );

        return redirect( route( 'items.index' ) )->with( 'message', 'Item eliminado exitosamente.' );
    }
}
