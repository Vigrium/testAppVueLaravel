<?php

namespace App\Http\Controllers\Rates;

use App\RatesCourses;
use App\RatesNames;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NamesContoller extends Controller
{
    public function index()
    {
        return view('Rates\welcome',['arValues'=>RatesNames::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllData(){
        $arData = [
            'names'=>[],
            'courses'=>[]
        ];

        $arNames = RatesNames::all();

        foreach ($arNames as $arName){
            $arData['names'][] = mb_strtoupper($arName->name);
        }

        $arCourses = RatesCourses::all();

        foreach ($arCourses as $arCours){
            $arData['courses'][ mb_strtoupper($arCours->ratePair)] = $arCours->rateCourse;
        }

        return new Response($arData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
