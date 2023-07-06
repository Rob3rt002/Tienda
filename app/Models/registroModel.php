<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Exception;

class registroModel extends Model
{
    public function get(){
        $sql= "SELECT * FROM customers";
        return DB::select($sql);
        
    }

    public function create($data){
        try {
            $sql =
            "insert into customers(
                customers_name,
                customers_lastname,
                customers_direction,
                customers_telefono,customers_correo,
                customers_password)
                values(?,?,?,?,?,?)";
            DB::insert(
                $sql, [$data->customers_name,
                $data->customers_lastname,
                $data->customers_direction,
                $data->customers_telefono,
                $data->customers_correo,
                $data->customers_password]);
            return true;
        } catch (Exception $e) {
            // Importante este getMessage te envia informacion de lo que ocurre
            echo $e->getMessage();
            return false;
        }
        
    }

    // public function eliminar($id){
    //     $sql = "DELETE FROM customers WHERE customers_id=?";
    //     return DB::select($sql,[$id]);
    // }
}
