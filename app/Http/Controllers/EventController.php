<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Http\Response;
use \Carbon\Carbon;

class EventController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function save(Request $request)
    {
        $validate = $this->validate($request, [
            'name_es' => ['required', 'string'],
            'desc_es' => ['required', 'string'],
            'name_eus' => ['required', 'string'],
            'desc_eus' => ['required', 'string'],
            'date' => ['required', 'date'],
            'image' => ['required', 'image', 'mimes:jpg, png, bmp, webp, gif, jpeg'],
        ]);

        $name_es = $request->get('name_es');
        $desc_es = $request->get('desc_es');
        $name_eus = $request->get('name_eus');
        $desc_eus = $request->get('desc_eus');
        $date = $request->get('date');
        $image = $request->file('image');
        $year = Carbon::parse($date)->format('Y');

        //Asignamos un nombre unico a la imagen ademas de su nombre original
        $image_name = time() ."_". $image->getClientOriginalName();

        //Guardamos en el Storage las imagenes
        \Storage::disk('events_images')->put($image_name, \File::get($image));

        $event = new Event();
        $event->name_es = $name_es;
        $event->desc_es = $desc_es;
        $event->name_eus = $name_eus;
        $event->desc_eus = $desc_eus;
        $event->date = $date;
        $event->image = $image_name;
        $event->year = $year;
        $event->save();

        return back()->with('exito', 'Evento creado!');
    }

    public function getEvents($year) {
        $events = Event::where('year', $year)->orderBy('id', 'desc')->get();

        if($events){
            $status = 200;
            return response(json_encode($events), $status)->header('Content-type', 'text/plain');
        }else{
            $status = 404;
            return response(json_encode('error'),$status);
        }
    }

    public function get($filename) {
        $file = \Storage::disk('events_images')->get($filename);

        return new Response($file, 200);
    }

    public function update(Request $request){

        $validate = $this->validate($request, [
            'id' => ['required', 'alpha_num'],
            'desc_es' => ['required', 'string'],
            'name_eus' => ['required', 'string'],
            'desc_eus' => ['required', 'string'],
            'date' => ['required', 'date'],
            'image' => ['nullable', 'image', 'mimes:jpg, png, bmp, webp, gif, jpeg'],
        ]);

        $id = $request->get('id');
        $name_es = $request->get('name_es');
        $desc_es = $request->get('desc_es');
        $name_eus = $request->get('name_eus');
        $desc_eus = $request->get('desc_eus');
        $date = $request->get('date');
        $year = Carbon::parse($date)->format('Y');
        $image = $request->file('image');

        $event = Event::find($id);

        if($event){
            $event->name_es = $name_es;
            $event->desc_es = $desc_es;
            $event->name_eus = $name_eus;
            $event->desc_eus = $desc_eus;
            $event->date = $date;

            if(!is_null($image)){
                \Storage::disk('events_images')->delete($event->image);
    
                //Asignamos un nombre unico a la imagen ademas de su nombre original
                $image_name = time() ."_". $image->getClientOriginalName();
        
                //Guardamos en el Storage las imagenes
                \Storage::disk('events_images')->put($image_name, \File::get($image));
        
    
                $event->name = $image_name;
            }

            $event->year = $year;
            $event->update();

            return back()->with('exito', 'Evento actualizado');
        }


        

        return back()->with('error', 'Error al actualizar el evento');

    }

    public function delete($id){
        $event = Event::find($id);

        if($event){
            \Storage::disk('events_images')->delete($event->image);
            $event->delete();

            return back()->with('exito', 'Evento borrado');
        }

        return back()->with('error', 'Error al borrar el evento');
    }
}
