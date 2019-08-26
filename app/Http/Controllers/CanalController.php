<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Canal;

class CanalController extends Controller
{
    public function index( Request $request){
        
        $canales = Canal::all();
        return ['canales' => $canales];
    }

    public function store(Request $request){
       
        try{
            DB::beginTransaction();

            $canal = new Canal();

            $canal->nombre_canal = $request->nombre_canal;

            $canal->save();

            DB::commit();

        }catch(Exception $e){

            DB::rollback();
            
        }
    }
}
