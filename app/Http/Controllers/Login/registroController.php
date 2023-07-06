<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Models\registroModel;
use Illuminate\Http\Request;
use Exception;

class registroController extends Controller
{
    public function returnData($data,$msg){
        if (sizeof($data) > 0) {
            $response =[
                "success" => "true",
                "data" => $data
            ];
            
        } else {
            $response =[
                "success" => "true",
                "message" => $msg
            ];
            
        }
        return json_encode($response);
    }

    public function index(){
        $model = new registroModel();
        $result = $model->get();
        return $this->returnData($result,"No se encontraron clientes");
        echo "<pre>";
        // print_r($result);
    }
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
     
    public function show(registroModel $registroModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     
    public function edit(registroModel $registroModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     
    public function update(Request $request, registroModel $registroModel)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     
     public function destroy( $id){
        
        }
    }*/
}
