<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get each id
        $pedidoOnOne = Pedido::where('estado','=', 1)->get();
        $pedidoOnTwo = Pedido::where('estado','=', 2)->get();
        $pedidoOnThree = Pedido::where('estado','=', 3)->get();
        $pedidoOnFour = Pedido::where('estado','=', 4)->get();
        $pedidoOnFive = Pedido::where('estado','=', 5)->get();

        return view('welcome', ['one' => $pedidoOnOne,'two' => $pedidoOnTwo, 'three' => $pedidoOnThree, 'four' => $pedidoOnFour, 'five' => $pedidoOnFive ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $pedido = Pedido::create();
        return response()->json($pedido);

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pedido=Pedido::find($id);
        // estado para transaccion
        $estadoInicial = $pedido->estado;
        $estadoFinal = $request->estado;
        // cambiar estado en pedido
        $pedido-> estado = $estadoFinal;
        $pedido->save();
        // create transaction
        $transaccion = Transaccion::create();
        return response()->json($pedido);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
