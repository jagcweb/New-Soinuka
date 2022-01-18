<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Http\Response;

class ImageController extends Controller
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
            'image' => ['required', 'image', 'mimes:jpg, png, bmp, webp, gif, jpeg'],
        ]);

        $image = $request->file('image');

        //Asignamos un nombre unico a la imagen ademas de su nombre original
        $image_name = time() ."_". $image->getClientOriginalName();

        //Guardamos en el Storage las imagenes
        \Storage::disk('images')->put($image_name, \File::get($image));

        $image_obj = new Image();
        $image_obj->name = $image_name;
        $image_obj->save();

        return back()->with('exito', 'Imagen subida');
    }

    public function get($filename) {
        $file = \Storage::disk('images')->get($filename);

        return new Response($file, 200);
    }

    public function getImages() {
        $image = Image::inRandomOrder()->first();

        if($image){
            $status = 200;
            return response(json_encode($image), $status)->header('Content-type', 'text/plain');
        }else{
            $status = 404;
            return response(json_encode('error'),$status);
        }
    }

    public function update(Request $request){

        $validate = $this->validate($request, [
            'id' => ['required', 'alpha_num'],
            'image' => ['required', 'image', 'mimes:jpg, png, bmp, webp, gif, jpeg'],
        ]);
        $image = $request->file('image');
        $id = $request->get('id');

        $image_obj = Image::find($id);

        if($image){
            \Storage::disk('images')->delete($image_obj->name);

            //Asignamos un nombre unico a la imagen ademas de su nombre original
            $image_name = time() ."_". $image->getClientOriginalName();
    
            //Guardamos en el Storage las imagenes
            \Storage::disk('images')->put($image_name, \File::get($image));
    

            $image_obj->name = $image_name;
            $image_obj->save();

            return back()->with('exito', 'Imagen actualizada');
        }

        return back()->with('error', 'Error al actualizar la imagen');

    }

    public function delete($id){
        $image = Image::find($id);

        if($image){
            \Storage::disk('images')->delete($image->name);
            $image->delete();

            return back()->with('exito', 'Imagen borrada');
        }

        return back()->with('error', 'Error al borrar la imagen');
    }
}
