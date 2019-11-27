<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatosController extends Controller
{
    //Listar todos os contatos
    public function contatosList()
    {
        $select = DB::table('contatos')
            ->get();
        return Response::json($select, 200);
    }

    //Listar um contato esecifico
    public function getContato($id)
    {
        $select = DB::table('contatos')
            ->where('id', '=', $id)
            ->take(1)
            ->get();
        return Response::json($select[0], 200);
    }

    //Aagar um contato
    public function delContato($id)
    {
        $delete = DB::table('contatos')
            ->where('id', '=', $id)
            ->delete();
        return Response::make("", 200);
    }

    //Adicionar um novo contato
    public function newContato()
    {
        $id = DB::table('contatos')->insertGetId(
            [
                'name' => Input::get("name"),
                'email' => Input::get("email"),
                'tel' => Input::get("tel"),
                'address' => Input::get("address"),
                'photo' => Input::get("photo")
            ]
        );

        return Response::json(['id'=>$id], 200);
    }

}
