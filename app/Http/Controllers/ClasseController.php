<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClasseRequest;
use App\Models\Classe;
use App\Models\Course;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClasseController extends Controller
{
    public function index(Course $course)
    {
        // Recuperar as aulas do banco de dados
        $classes = Classe::with('course')
            ->where('course_id', $course->id)
            ->orderBy('order_classe')
            ->get();

        //Salvar  log
        Log::info('Listar aulas');

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
    public function store(ClasseRequest $request)
    {
        // Validar o formulário
        $request->validated();

        // Marcar o ponto inicial da transação
        DB::beginTransaction();

        try {

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

            // Operação é concluída
            DB::commit();

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('classe.index', ['course' => $request->course_id])->with('success', 'Aula cadastrada com sucesso!');
        } catch (Exception $e) {
            // Quando a operação não é concluida
            DB::rollBack();
            // Redirecionar o usuário, enviar a mensagem de error
            return back()->withInput()->with('error', 'A aula não pode ser cadastrada!');
        }
    }

    // Carregar o formulario editar aula
    public function edit(Classe $classe)
    {
        // Carregar a view
        return view('classes.edit', ['classe' => $classe]);
    }

    // Editar no banco de dados a aula
    public function update(ClasseRequest $request, Classe $classe)
    {
        // Validar o formulario
        $request->validated();

        // Marcar o ponto inicial da transação
        DB::beginTransaction();

        try {

            // Editar as informações do registro no banco de dados
            $classe->update([
                'name' => $request->name,
                'description' => $request->description
            ]);

            // Operação é concluída
            DB::commit();

            // Redirecionar o usuário e enviar mensagem de sucesso
            return redirect()->route('classe.index', ['course' => $classe->course_id])->with('success', 'Aula editada com sucesso!');
        } catch (Exception $e) {
            // Quando a operação não é concluida
            DB::rollBack();
            // Redirecionar o usuário, enviar a mensagem de error
            return back()->withInput()->with('error', 'A aula não pode ser editada!');
        }
    }

    // Visualizar aula
    public function show(Classe $classe)
    {
        //Salvar  log
        Log::info('Visualizar a aula', ['classe_id' => $classe->id]);

        // Carregar a VIEW
        return view('classes.show', ['classe' => $classe]);
    }

    // Excluir a aula do banco de dados
    public function destroy(Classe $classe)
    {
        try {
            // Excluir o registro do banco de dados
            $classe->delete();

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('classe.index', ['course' => $classe->course_id])->with('success', 'Aula excluída com sucesso!');
        } catch (Exception $e) {
            //Salvar  log
            Log::warning('A aula não foi excluída', ['error' => $e->getMessage()]);
            // Redirecionar o usuário, enviar a mensagem de erro
            return redirect()->route('classe.index')->with('error', 'A aula não foi excluída');
        }
    }
}
