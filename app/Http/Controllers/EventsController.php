<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;

class EventsController extends Controller
{
    private function buildEvent(Event $event, $data, UploadedFile $imgFile = null): Event
    {
        if (!is_null($imgFile)) {

            $content = base64_encode(file_get_contents($imgFile->getRealPath()));
            $mimeType = $imgFile->getClientMimeType();
            $event->image = "data:{$mimeType};base64,{$content}";
        }

        $event->name = $data["name"];
        $event->date = $data["date"];
        $event->description = $data["description"];
        $event->location = $data["location"];
        return $event;
    }

// Create
    function store(EventRequest $request)
    {


        $validated = $request->validated();
        $imgFile = $request->file("imgFile");
        if (is_null($imgFile)) {
            return response("not valid", 422);
        }
        $event = new Event();
        $event = $this->buildEvent($event, $validated, $imgFile);
        $event->save();

        return $event;
    }

// Update
    function update(EventRequest $request,$id )
    {
        Log::debug("Update");
        $validated = $request->validated();
        if(count($validated) < 4){
            abort(422);
        }
        $imgFile = $request->file("imgFile");
        $event = Event::where('id', $id)->first();
        if (is_null($event)) {
            return abort(404);
        }
        $event = $this->buildEvent($event, $validated, $imgFile);

        $event->update();

        return $event;
    }

// Read
    function getById(int $id)
    {
        $event = Event::find($id);
        if (is_null($event)) {
            abort(404);
        }

        return $event;
    }

    function getAll()
    {
        $events = Event::get();
        if (count($events) === 0) {
            abort(404);
        }
        return $events;
    }


    // Delete

    function  delete($id){
        Event::destroy($id);
        return response(null, 204);
    }


}
