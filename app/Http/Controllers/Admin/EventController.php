<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event;
use Intervention\Image\Facades\Image;
Use Carbon\Carbon;

class EventController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function addEvent (){
    	$event = Event::latest()->get();
    	return view ('admin.event.add', compact('event'));
    }

    public function storeEvent(Request $request){
    	$request->validate([
    		'tittle' => 'required|max:255',
    		'long_description' => 'required',
    	]);

    	$imag_one = $request->file('image_one');
    	$name_gen=hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
    	Image::make($imag_one)->resize(270,270)->save('upload/img/event/'.$name_gen);
    	$img_url1 = 'upload/img/event/'.$name_gen;

    	Event::insert([
    		'tittle' => $request->tittle,
    		'tittle_slug' => strtolower(str_replace(' ','-',$request->tittle)),
    		'long_description' => $request->long_description,
    		'image_one' => $img_url1,
    		'created_at' => Carbon::now()
    	]);

    	return redirect()->back()->with('success', 'Event Added');
    }

    public function manageEvent(){
    	$events = Event::orderby('id', 'DESC')->get();
    	return view('admin.event.manage', compact('events'));
    }

    public function editEvent($event_id){
    	$event = Event::findOrFail($event_id);
    	return view('admin.event.edit', compact('event'));
    }

    public function updateEvent(Request $request){
        $event_id = $request->id;

        Event::findOrFail($event_id)->Update([
        'tittle' => $request->tittle,
        'tittle_slug' => strtolower(str_replace(' ','-',$request->tittle)),
        'long_description' => $request->long_description,
        'created_at' => Carbon::now()
        ]);

        return redirect()->route('manage-events')->with('success', 'Event succesfully updated');
    }

    public function updateImage(Request $request){
        $event_id = $request->id;
        $old_one = $request->img_one;

        if($request->has('image_one')){
            unlink($old_one);
            $imag_one = $request->file('image_one');
            $name_gen=hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
            Image::make($imag_one)->resize(270,270)->save('upload/img/event/'.$name_gen);
            $img_url1 = 'upload/img/event/'.$name_gen;

            Event::findOrFail($event_id)->update([
                'image_one' => $img_url1,
                'updated_at' => Carbon::now()
            ]);

            return redirect()->Route('manage-events')->with('success','Image successfully updated');
        }
    }

    public function destroy($event_id){
            $image = Event::findOrFail($event_id);
            $img_one = $image->image_one;
            unlink($img_one);

            Event::findOrFail($event_id)->delete();
            return redirect()->back()->with('delete', 'successfully deleted');
    }

    public function Inactive($event_id){
        Event::findOrFail($event_id)->update(['status' => 0]);
        return redirect()->back()->with('Catupdated','Event Inactive');   
    }

    public function Active($event_id){
        Event::findOrFail($event_id)->update(['status' => 1]);
        return redirect()->back()->with('Catupdated','Event Active');
    }
}
