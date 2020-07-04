<?php

namespace App\Http\Controllers;

use App\Models\Filial;
use App\Api\ApiMessages;
use App\Http\Requests\FilialRequest;

class FilialController extends Controller
{
    private $filial;

    public function __construct(Filial $filial)
    {
        $this->filial = $filial;
    }

    public function index()
    {

        $filiais = $this->filial->get();
        return view('filial.index', compact('filiais'));
    }

    public function create()
    {
        return view('filial.create');
    }

    public function store(FilialRequest $request)
    {
        $data = $request->all();
        try{
            $filial = $this->filial->create($data);
            flash('Filial cadastrada com sucesso!')->success();
            return redirect()->route('filial.index');
        }catch(\Exception $e){
            $message = env('APP_DEBUG') ? new ApiMessages($e->getMessage()) : '';
            return response()->json(['error' => $message->getMessage()], 500);
        }
    }

    public function show($id)
    {
        $filial = $this->filial->whereId($id)->first();
        return view('filial.show', compact('filial'));
    }

    public function edit($id)
    {
        $filial = $this->filial->whereId($id)->first();
        return view('filial.edit', compact('filial'));
    }

    public function delete($id)
    {
        $filial = $this->filial->whereId($id)->first();
        return view('filial.delete', compact('filial'));
    }

    public function update(FilialRequest $request, $id)
    {
        $data = $request->all();
        try{
            $filial = $this->filial->find($id);
            $filial->update($data);
            flash('Filial atualizada com sucesso!')->success();
            return redirect()->route('filial.index');
        }catch(\Exception $e){
            $message = env('APP_DEBUG') ? new ApiMessages($e->getMessage()) : '';
            return response()->json(['error' => $message->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try{
            $filial = $this->filial->find($id);
            $filial->delete();
            flash('Filial excluída com sucesso!')->success();
            return redirect()->route('filial.index');
        }catch(\Exception $e){
            $message = env('APP_DEBUG') ? new ApiMessages($e->getMessage()) : '';
            return response()->json(['error' => $message->getMessage()], 500);
        }
    }
}
