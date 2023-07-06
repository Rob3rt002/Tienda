<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class loginModel extends Model{
    public function getUser($user){
        $sql = "SELECT customers_correo FROM customers
                where 
                    product_active = ?
                    and product_active = 1";
        return DB::select($sql,array($user));
    }
}
