<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendas;

class VendasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Vendas::paginate(15);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vendas = New Vendas();
        $data = $request->all();
        $vendas->cliente_id = $data['cliente_id'];
        $vendas->produto_id = $data['produto_id'];
        $vendas->quantidade = $data['quantidade'];
        
        if( $vendas->save() ){  
            return $vendas;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Vendas::find($id);
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
        $vendas = Vendas::find($id);
        $data = $request->all();
        $vendas->cliente_id = $data['cliente_id'];
        $vendas->produto_id = $data['produto_id'];
        $vendas->quantidade = $data['quantidade'];
        
        if( $vendas->save() ){  
            return $vendas;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vendas = Vendas::find($id);
        return $vendas->delete();
    }
}
