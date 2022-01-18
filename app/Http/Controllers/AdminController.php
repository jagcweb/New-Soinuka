<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Event;
use \Carbon\Carbon;
use App\Models\MasterKey;

class AdminController extends Controller
{
    public function index()
    {

        $master_key = MasterKey::find(1);

        return view('admin_home', [
            'master_key' => $master_key
        ]);
    }

    public function getImages(){
        $images = Image::orderBy('id', 'desc')->get()   ;

        return view('images', [
            'images' => $images
        ]);
    }

    public function getEvents(){
        $events = Event::orderBy('id', 'desc')->get();

        return view('events', [
            'events' => $events
        ]);
    }
    
}
