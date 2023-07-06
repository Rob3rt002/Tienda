<?php

namespace App\Http\Controllers\Login;

use App\Models\clienteModel;
use Illuminate\Http\Request;

class clienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $objData = json_decode($request->getContent());
            $model = new registroModel();
            $result = $model->create($objData);
            
            if ($result) {
                echo "registro exitoso";
            }else {
                echo "Se produjo un error, intentando registrar";
            }
        }catch(Exception $e){
            echo "Se produjo un error, No se que paso";
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(clienteModel $clienteModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(clienteModel $clienteModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, clienteModel $clienteModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(clienteModel $clienteModel)
    {
        //
    }
}
