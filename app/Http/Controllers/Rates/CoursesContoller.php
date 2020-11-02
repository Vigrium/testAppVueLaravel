<?php

namespace App\Http\Controllers\Rates;

use App\Http\Controllers\Controller;
use App\RatesCourses;
use App\RatesNames;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CoursesContoller extends Controller
{

    public function index()
    {

    }

    /**
    *Update all courses from api
     */
    public function updateAll()
    {
        $arItemsRates = RatesNames::all();
        $arNames = [];

        foreach ($arItemsRates as $arItem) {
            $arNames[] = $arItem->name;
        }

        $arPairs = [];

        foreach ($arNames as $key => $name) {
            foreach ($arNames as $key2 => $name2) {
                if ($key !== $key2) {
                    $arPairs[] = mb_strtoupper($name . $name2);
                }
            }
        }

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://currate.ru/api/?get=rates&key=f298b849c1f0783686a1fc76b7112a55&pairs=' . implode(',', $arPairs),
            // You can set any number of default request options.
            'timeout' => 2.0,
        ]);

        $response = $client->request('GET', '');

        $arCourses = json_decode($response->getBody()->getContents(), 1)['data'];
        $arKeys = array_keys($arCourses);

        $arItems = \App\RatesCourses::query()->whereIn('ratePair', $arKeys)->get();
        $arKeysExists = [];
        foreach ($arItems as $arItem) {
            $arKeysExists[$arItem->ratePair] = $arItem->id;
        }

        foreach ($arCourses as $key => $apiCourse) {
            $arCoursesExists = \App\RatesCourses::all();
            if (!array_key_exists($key, $arKeysExists)) {
                $course = new \App\RatesCourses();
                $course->ratePair = $key;
                $course->rateCourse = $apiCourse;
                $course->save();
            } else {
                $course = $arCoursesExists->find($arKeysExists[$key]);
                $course->rateCourse = $apiCourse;
                $course->save();
            }
        }
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
