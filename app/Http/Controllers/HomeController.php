<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Event;
use \Carbon\Carbon;
use App\Models\MasterKey;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $image = Image::inRandomOrder()->first();

        $now = Carbon::now()->format('Y');

        $events = Event::where('year', $now)->orderBy('id', 'desc')->get();

        $startDate = Carbon::parse('2020-01-01');

        $master_key = MasterKey::find(1);

        return view('home', [
            'image' => $image,
            'events' => $events,
            'startDate' => $startDate,
            'master_key' => $master_key
        ]);
    }

    public function setCookie($idioma){ //Cambiar entre ESP y EUS
        if (\Cookie::get('idioma') != null) {
            \Cookie::queue(\Cookie::forget('idioma'));
        }

        \Cookie::queue('idioma', $idioma, 15*24*60);
    }

    public function getCookie(){ //Obtener idioma
        $cookie = \Cookie::get('idioma') ? \Cookie::get('idioma'): 'es';

        return response(json_encode($cookie))->header('Content-type', 'text/plain');
    }
}
