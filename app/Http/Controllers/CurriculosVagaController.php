<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CurriculosVaga;
use App\Models\Vaga;
use App\Models\User;
use App\Models\Resposta;
use App\Models\Pergunta;
use App\Models\Feedback;
use App\Models\CandidaturaVaga;
use Illuminate\Support\Facades\Mail;

class CurriculosVagaController extends Controller
{
    public function index(Vaga $vaga)
    {
        $tags = [
            'Aprovado' => 'bg-primary text-white',
            'Rejeitado' => 'bg-danger text-white',
            'Em análise' => 'bg-info text-white',
            'Contratado' => 'bg-success text-white',
            'Agendar entrevista' => 'bg-warning text-grey',
            'Arquivado' => 'bg-secondary text-white',
            'Transferido' => 'bg-info text-white',
        ];
        

        return view('curriculosVaga.index', compact('vaga', 'tags'));
    }

    public function show(CandidaturaVaga $candidatura) {
        $listaVagas = Vaga::all();
        return view('curriculosVaga.show', compact('candidatura', 'listaVagas'));
    }

    public function update(Request $request) { 

        $candidaturaVaga = new CandidaturaVaga();
        $candidaturaVaga->user_id = $request->user_id;
        $candidaturaVaga->vaga_id = $request->vaga_id;
        $candidaturaVaga->transferencia_vaga = $request->transferencia_vaga_id;
        $candidaturaVaga->save();

        $feedback = new Feedback();
        $feedback->user_id = $request->user_id;
        $feedback->vaga_id = $request->vaga_id;
        $feedback->feedback_avaliacao = 'Candidato transferido para outra vaga';
        $feedback->status_processo = 'Transferido';
        $feedback->candidatura_vaga_id = $candidaturaVaga->id;
        $feedback->save();

        // $curriculos = CurriculosVaga::all()->where('vaga_id', $id);
        $curriculos = CandidaturaVaga::all()->where('vaga_id', $request->vaga_id);
        $vaga = Vaga::find($request->vaga_id);
        $user = User::all();
        // buscar usuario que se candidatou na vaga
        foreach ($curriculos as $curriculo) {
            $user = User::find($curriculo->user_id);
            $feedback = Feedback::where('vaga_id', $request->vaga_id)->where('user_id', $curriculo->user_id)->get()->first();
            $curriculo->user = $user;
        }        

        if (isset($feedback)) {
            $feedback = Feedback::where('vaga_id', $request->vaga_id)->where('user_id', $curriculo->user_id)->get()->first();
        } else {
            $feedback = null;
        }

        return redirect()->route('curriculosVaga.index', compact('curriculos', 'vaga', 'user', 'feedback'))->with('success', 'Candidato transferido com sucesso.');
    }

 
    

}
