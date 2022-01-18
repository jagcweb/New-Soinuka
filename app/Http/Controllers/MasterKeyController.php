<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Event;
use \Carbon\Carbon;
use App\Models\MasterKey;

class MasterKeyController extends Controller
{
    public function save(Request $request)
    {

        $validate = $this->validate($request, [
            'key' => ['required', 'string', 'min:8'],
            'key_confirm' => ['required', 'string', 'min:8'],
        ]);

        $key = $request->get('key');
        $key_confirm = $request->get('key_confirm');

        if($key !== $key_confirm){
            return back()->with('error', 'La claves introducidas no coinciden');
        }

        $master_key = new MasterKey();
        $master_key->master_key = \Crypt::encryptString($key);
        $master_key->tries = 3;
        $master_key->save();

        $data = ['key' => $key];
        \Mail::send('mail_template', $data, function ($message) use($key) {
            $message->from('soinuka.info@gmail.com', 'Soinuka');
            $message->to('soinuka.info@gmail.com')->subject('Copia de la clave maestra');
        });

        return back()->with('exito', 'Clave maestra creada!');
    }


    public function match(Request $request){
        $validate = $this->validate($request, [
            'key' => ['required', 'string', 'min:8'],
        ]);

        $key = $request->get('key');

        $master_key = MasterKey::find(1);

        $decrypted_key = \Crypt::decryptString($master_key->master_key);

        if($key !== $decrypted_key){
            $master_key->tries--;
            $master_key->update();
            return back()->with('error', 'La clave introducida no coincide.');
        }

        \Cookie::queue('clave', \Crypt::encryptString($key), 15*24*60);

        return back()->with('exito', 'La clave introducida es correcta, será recordada por 15 días.');
    
    }

    public function generate(){
        $master_key = MasterKey::find(1);

        $new_key = \Str::random(8);

        $master_key->master_key = \Crypt::encryptString($new_key);
        $master_key->tries = 3;
        $master_key->save();

        $data = ['key' => $new_key];
        \Mail::send('mail_template', $data, function ($message) use ($new_key){
            $message->from('soinuka.info@gmail.com', 'Soinuka');
            $message->to('soinuka.info@gmail.com')->subject('Copia de la nueva clave maestra');
        });

        return back()->with('exito', 'Una nueva clave ha sido generada y enviada al email.');
    
    }
    
}
