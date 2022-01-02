<?php

namespace App\Http\Controllers;

use App\IdentificationNumber;
use Illuminate\Http\Request;
use App\Http\Requests\IdentificationNumberRequest;
use App\Jobs\CheckInnJob;


class IdentificationNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('identification-number.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IdentificationNumberRequest $request)
    {
      $identificationNumber = IdentificationNumber::firstOrCreate(['inn' => $request->inn]);

      if(!$identificationNumber->service_response){
        CheckInnJob::dispatch($request->inn, $identificationNumber);
        return view('checked', ['identificationNumber' => $identificationNumber]);
      }

      return redirect()->route('identification-number.show', $identificationNumber->inn);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IdentificationNumber  $identificationNumber
     * @return \Illuminate\Http\Response
     */
    public function show(IdentificationNumber $identificationNumber)
    {
        return view('show', ['identificationNumber' => $identificationNumber]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IdentificationNumber  $identificationNumber
     * @return \Illuminate\Http\Response
     */
    public function edit(IdentificationNumber $identificationNumber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IdentificationNumber  $identificationNumber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IdentificationNumber $identificationNumber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IdentificationNumber  $identificationNumber
     * @return \Illuminate\Http\Response
     */
    public function destroy(IdentificationNumber $identificationNumber)
    {
        //
    }
}
