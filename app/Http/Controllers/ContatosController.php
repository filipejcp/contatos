<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Contactos;
use DB;
use Response;
use Illuminate\Support\Facades\Input;

class ContatosController extends Controller
{
    //Listar todos os contatos
    public function contatosList()
    {
        $select = DB::table('contactos')
            ->get();
        return Response::json($select);
    }

    //Listar um contato esecifico
    public function getContato($id)
    {
        $select = DB::table('contactos')
            ->where('id', '=', $id)
            ->take(1)
            ->get();
        return Response::json($select[0], 200);
    }

    //Aagar um contato
    public function delContato($id)
    {
        $delete = DB::table('contactos')
            ->where('id', '=', $id)
            ->delete();
        return Response::make("", 200);
    }

    //Adicionar um novo contato
    public function newContato(Request  $request)
    {
        /*$id = DB::table('contactos')->insertGetId(
            [
                'nome' => Input::get("nome"),
                'email' => Input::get("email"),
                'ntelemovel' => Input::get("ntelemovel"),
                'ntelefone' => Input::get("ntelefone"),
                'idade' => Input::get("idade"),
                'altura' => Input::get("altura"),
                'genero'=> Input::get("genero"),

            ]
        );

        return Response::json(['id'=>$id], 200);*/

        return Contactos::create($request->all());
    }

}
