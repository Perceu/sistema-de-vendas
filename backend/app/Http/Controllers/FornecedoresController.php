<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedores;

class FornecedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Fornecedores::paginate(15);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fornecedor = New Fornecedores();
        $data = $request->all();
        $fornecedor->name = $data['name'];
        
        if( $fornecedor->save() ){  
            return $fornecedor;
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
        return Fornecedores::find($id);
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
        $fornecedor = Fornecedores::find($id);
        $data = $request->all();
        $fornecedor->name = $data['name'];
        
        if( $fornecedor->save() ){  
            return $fornecedor;
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
        $fornecedor = Fornecedores::find($id);
        return $fornecedor->delete();
    }
}
