<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //All Movie
    public function allMovie(String $apiKey)
    {
        $key = DB::table('api_key')->where('key', '=', $apiKey)->first();

        if (!is_null($key)) {

            $data = DB::table('movie')->paginate(15, ['Title', 'Year', 'imdbId', 'Type', 'Poster']);

            $ouput = [
                'Search' => $data->items(),
                'totalResults' => $data->total(),
                'currentPage' => $data->currentPage(),
                'Response' => 'True',
            ];

            return $ouput;

        } else {

            return [
                'Status' => 'Error',
                'Response' => 'False',
            ];

        }
    }

    // Seach Movie
    public function searchMovie(String $apiKey, String $search)
    {
        $key = DB::table('api_key')->where('key', '=', $apiKey)->first();

        if (!is_null($key)) {

            $data = DB::table('movie')->whereRaw('Title LIKE ?', ['%' . $search . '%'])->paginate(15, ['Title', 'Year', 'imdbId', 'Type', 'Poster']);

            $ouput = [
                'Search' => $data->items(),
                'totalResults' => $data->total(),
                'currentPage' => $data->currentPage(),
                'Response' => 'True',
            ];

            return $ouput;
        } else {

            return [
                'Status' => 'Error',
                'Response' => 'False',
            ];
        }
    }

    // Search with sort
    public function searchWithSortMovie(String $apiKey, String $search, String $sort)
    {
        $key = DB::table('api_key')->where('key', '=', $apiKey)->first();

        if (!is_null($key)) {

            if ($sort != 'asc' && $sort != 'desc') {

                return [
                    'Status' => 'Error',
                    'Response' => 'False',
                ];

            } else {

                $data = DB::table('movie')->whereRaw('Title LIKE ?', ['%' . $search . '%'])->orderBy('Title', $sort)->paginate(15, ['Title', 'Year', 'imdbId', 'Type', 'Poster']);

                $ouput = [
                    'Search' => $data->items(),
                    'totalResults' => $data->total(),
                    'currentPage' => $data->currentPage(),
                    'Response' => 'True',
                ];

                return $ouput;
            }
        } else {

            return [
                'Status' => 'Error',
                'Response' => 'False',
            ];

        }
    }
}
