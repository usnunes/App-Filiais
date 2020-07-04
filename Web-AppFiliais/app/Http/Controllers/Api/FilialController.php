<?php

namespace App\Http\Controllers\Api;

use App\Models\Filial;
use App\Http\Controllers\Controller;

class FilialController extends Controller
{
    private $filial;

    public function __construct(Filial $filial)
    {
        $this->filial = $filial;
    }

    public function index()
    {
        $filiais = $this->filial->all();
        return response()->json($filiais);
    }

    public function show($id)
    {
        $filial = $this->filial->whereId($id)->first();
        return $filial
                ? response()
                    ->json([
                        'data'      => $filial,
                        'message'   => 'Sucesso!',
                        'success'   => true
                    ],200)
                :  response()
                ->json([
                    'message'   => 'Não Encontrado!',
                    'success'   => false
                ],200);
    }
}
