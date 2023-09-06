<?php

namespace App\Http\Controllers;

use App\Http\Resources\InstrumentResurs;
use App\Models\Instrument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InstrumentController extends BaseController
{
    public function index()
    {
        $instrumenti = Instrument::all();
        return $this->uspesnoOdgovor(InstrumentResurs::collection($instrumenti), 'Vraceni su svi instrumenti.');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'model' => 'required',
            'cena' => 'required',
            'proizvodjacId' => 'required',
            'tipId' => 'required',
        ]);
        if($validator->fails()){
            return $this->greskaOdgovor($validator->errors());
        }

        $instrument = Instrument::create($input);

        return $this->uspesnoOdgovor(new InstrumentResurs($instrument), 'Novi instrument je kreiran.');
    }


    public function show($id)
    {
        $instrument = Instrument::find($id);
        if (is_null($instrument)) {
            return $this->greskaOdgovor('Instrument sa zadatim id-em ne postoji.');
        }
        return $this->uspesnoOdgovor(new InstrumentResurs($instrument), 'Instrument sa zadatim id-em je vracen.');
    }


    public function update(Request $request, $id)
    {
        $instrument = Instrument::find($id);
        if (is_null($instrument)) {
            return $this->greskaOdgovor('Instrument sa zadatim id-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'model' => 'required',
            'cena' => 'required',
            'proizvodjacId' => 'required',
            'tipId' => 'required',
        ]);

        if($validator->fails()){
            return $this->greskaOdgovor($validator->errors());
        }

        $instrument->model = $input['model'];
        $instrument->cena = $input['cena'];
        $instrument->proizvodjacId = $input['proizvodjacId'];
        $instrument->tipId = $input['tipId'];
        $instrument->save();

        return $this->uspesnoOdgovor(new InstrumentResurs($instrument), 'Instrument je azuriran.');
    }

    public function destroy($id)
    {
        $instrument = Instrument::find($id);
        if (is_null($instrument)) {
            return $this->greskaOdgovor('Instrument sa zadatim id-em ne postoji.');
        }

        $instrument->delete();
        return $this->uspesnoOdgovor([], 'Instrument je obrisan.');
    }
}
