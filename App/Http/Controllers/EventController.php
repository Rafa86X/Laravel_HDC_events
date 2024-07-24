<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $events = Event::all();

        return view('welcome',['events' => $events]);
    }

    public function create(){    
        return view('events.create');
    }

    public function store(Request $request){
        $event = new Event;
        $event->title = $request->title;
        $event->description = $request->description;
        $event->private = $request->private;
        $event->city = $request->city;
        $event->items = $request->items;
        $event->date = $request->date;
        
        // tratando o recebimento de imagem
        if($request->hasFile('image')&& $request->file('image')->isValid()){


            $requestImage = $request->image;

             $extencion = $requestImage->extension();
             var_dump($extencion);
             $imageName = md5($requestImage->getClientOriginalName().strtotime("now")).".".$extencion;

             $requestImage->move(public_path('img/events'),$imageName);

             $event->image = $imageName;
        }

        $event->save();

        return redirect('/')->with('msg','Deu Certo!');
    }


    public function show($id){
        $event = Event::findOrFail($id);
        return view('events.show',['event'=> $event]);
    }

}



