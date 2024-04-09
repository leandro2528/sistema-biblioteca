<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Emprestimo;
use App\Models\Leitor;
use App\Models\Livro;

use Dompdf\Dompdf;
use Dompdf\Options;


class EmprestimoController extends Controller
{
    public function index() {
        $emprestimos = Emprestimo::with('leitor', 'livro')->get();
        $leitors = Leitor::all();
        $livros = Livro::all();
        return view('emprestimos.index',
        [
            'emprestimos'=>$emprestimos,
            'leitors'=>$leitors,
            'livros'=>$livros
        ]
    );
    }

    public function gerarPDF() {
        $emprestimos = Emprestimo::with('leitor', 'livro')->get();
        $livros = Livro::all();
        $leitors = Leitor::all();
        
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);
    
        // Renderiza a visualização para HTML
        $html = view('emprestimos.pdf', compact('emprestimos'))->render();
    
        // Carrega o HTML no Dompdf
        $dompdf->loadHtml($html);
    
        // Renderiza o PDF
        $dompdf->render();
    
        // Retorna o PDF para download
        return $dompdf->stream('emprestimos.pdf');
    }
8888888888888888888888888888888888888888888888888888888    
    

    public function create() {
        $emprestimos = Emprestimo::all();
        $livros = Livro::all();
        $leitors = Leitor::all();
        return view('emprestimos.create',
        [
            'emprestimos'=>$emprestimos,
            'livros'=>$livros,
            'leitors'=>$leitors
        ]
    );
    }

    public function store(Request $request) {
        $request->validate([
            'livro_id' => 'required',
            'leitor_id' => 'required',
            'data_emprestimo' => 'required',
            'data_devolucao' => 'required',
            'quantidade_emprestada' => 'required'
        ]);
        Emprestimo::create($request->all());

        session()->flash('success', 'Emprestimo cadastrado com sucesso!');

        return redirect()->route('emprestimos-index');
    }

    public function edit($id) {
        $emprestimos = Emprestimo::findOrFail($id);
        $livros = Livro::all();
        $leitors = Leitor::all();

        return view('emprestimos.edit', 
        [
            'emprestimos'=>$emprestimos,
            'livros'=>$livros,
            'leitors'=>$leitors
        ]
    );
    }

    public function update(Request $request, $id) {
        $request->validate([
            'livro_id' => 'required',
            'leitor_id' => 'required',
            'data_emprestimo' => 'required',
            'data_devolucao' => 'required',
            'quantidade_emprestada' => 'required'
        ]);
        $emprestimos = Emprestimo::findOrFail($id);
        $emprestimos->update($request->all());
        return redirect()->route('emprestimos-index');
    }

    public function destroy($id) {
        $emprestimos = Emprestimo::findOrFail($id);
        $emprestimos->delete();

        session()->flash('danger', 'Emprestimo excluido com sucesso!');

        return redirect()->route('emprestimos-index');
    }
}
