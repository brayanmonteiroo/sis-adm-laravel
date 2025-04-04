<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Listar os cursos
    public function index(){
       //Carrega a view
       return view('courses.index');
    }

     // Visualizar o curso
     public function show(){        
        //Carrega a view
        return view('courses.show');
     }

     // Carregar o forumulario cadastrar novo curso
     public function create(){        
        //Carrega a view
        return view('courses.create');
     }

      // Cadastrar no banco de dados o novo curso
      public function store(){        
        dd('Cadastrar no banco os dados o curso');
     }

      // Carregar o forumulario editar curso
      public function edit(){        
        //Carrega a view
        return view('courses.edit');
     }

      // Atualiza as informações no banco os dados do curso
      public function update(){
        dd("Editar no banco os dados o curso");
     }

      // Exclui o curso no banco os dados
      public function destroy(){
        dd("Excluir no banco os dados o curso");
     }
}
