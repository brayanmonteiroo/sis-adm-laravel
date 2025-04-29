<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\Course;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CourseController extends Controller
{

    // Listar os cursos
    public function index()
    {

        // Recuperar os registros do banco dados
        // $courses = Course::where('id', 1000)->get();
        // $courses = Course::paginate(10);
        $courses = Course::orderBy('ID', 'ASC')->get();

        //Salvar  log
        Log::info('Listar cursos');

        // Carregar a VIEW
        return view('courses.index', ['courses' => $courses]);
    }

    // Visualizar o curso
    public function show(Course $course)
    {

        // dd($request->course);
        // $course = Course::where('id', $request->course)->first();

        //Salvar  log
        Log::info('Visualizar o curso', ['course_id' => $course->id]);

        // Carregar a VIEW
        return view('courses.show', ['course' => $course]);
    }

    // Carregar o formulário cadastrar novo curso
    public function create()
    {

        // Carregar a VIEW
        return view('courses.create');
    }

    // Cadastrar no banco de dados o novo curso
    public function store(CourseRequest $request)
    {

        // Validar o formulário
        $request->validated();

        // Marcar o ponto inicial da transação
        DB::beginTransaction();

        try {

            // Cadastrar no banco de dados na tabela cursos os valores de todos os campos
            // dd($request->name);
            $course = Course::create([
                'name' => $request->name,
                'price' => $request->price,
            ]);

            // Operação é concluída
            DB::commit();

            //Salvar  log
            Log::info('Curso cadastrado', ['course_id' => $course->id]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('course.show', ['course' => $course->id])->with('success', 'Curso cadastrado com sucesso!');
        } catch (Exception $e) {
            // Quando a operação não é concluida
            DB::rollBack();
            //Salvar  log
            Log::notice('Curso não cadastrado', ['error' => $e->getMessage()]);
            // Redirecionar o usuário, enviar a mensagem de error
            return back()->withInput()->with('error', 'O curso não pode ser cadastrado!');
        }
    }

    // Carregar o formulário editar curso
    public function edit(Course $course)
    {

        // Carregar a VIEW
        return view('courses.edit', ['course' => $course]);
    }

    // Editar no banco de dados o curso
    public function update(CourseRequest $request, Course $course)
    {

        // Validar o formulário
        $request->validated();

        // Marcar o ponto inicial da transação
        DB::beginTransaction();

        try {

            // Editar as informações do registro no banco de dados
            $course->update([
                'name' => $request->name,
                'price' => $request->price,
            ]);

            // Operação é concluída
            DB::commit();

            //Salvar  log
            Log::info('Curso editado', ['course_id' => $course->id]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('course.show', ['course' => $course->id])->with('success', 'Curso editado com sucesso!');
        } catch (Exception $e) {
            // Quando a operação não é concluida
            DB::rollBack();
            //Salvar  log
            Log::warning('Curso não editado', ['error' => $e->getMessage()]);
            // Redirecionar o usuário, enviar a mensagem de error
            return back()->withInput()->with('error', 'O curso não pode ser editado!');
        }
    }

    // Excluir o curso do banco de dados
    public function destroy(Course $course)
    {
        try {
            // Excluir o registro do banco de dados
            $course->delete();

            //Salvar  log
            Log::info('Curso apagado', ['course_id' => $course->id]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('course.index')->with('success', 'Curso excluído com sucesso!');
        } catch (Exception $e) {
            //Salvar  log
            Log::warning('Curso não apagado', ['error' => $e->getMessage()]);
            // Redirecionar o usuário, enviar a mensagem de erro
            return redirect()->route('course.index')->with('error', 'O curso não pode ser excluído!');
        }
    }
}
