<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Course;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    public function index(Course $course)
    {
        // Recuperar as aulas do banco de dados
        $classes = Classe::with('course')
        ->where('course_id', $course->id)
        ->orderBy('order_classe')
        ->get();

        // Carregar a view
        return view('classes.index', ['course' => $course, 'classes' => $classes]);
    }

    // Carrega o formulário cadastrar nova aula
    public function create(Course $course)
    {   
        // Carrega a view
        return view('classes.create', ['course' => $course]);
    }

    // Cadastrar no banco de dados a nova aula
    public function store(Request $request)
    {   
        // Recuperar a ultima ordem da aula no curso
        $lastOrderClasse = Classe::where('course_id', $request->course_id)
            ->orderBy('order_classe', 'DESC')
            ->first();


        // Cadastrar no banco de dados a nova aula
        Classe::create([
            'name' => $request->name,
            'description' => $request->description,
            'order_classe' => $lastOrderClasse ? $lastOrderClasse->order_classe + 1 : 1,
            'course_id' => $request->course_id
        ]);

        // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('classe.index', ['course' => $request->course_id])->with('success', 'Aula cadastrada com sucesso!');
    }
}
