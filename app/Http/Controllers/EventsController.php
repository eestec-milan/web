<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

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

    public function get(Request $request)
    {
        $data = $request->all();
        $result = DB::table('events')
            ->where('name', 'like', '%' . $data['search']['value'] . '%')
            ->orderBy('name')
            ->skip($data['start'])
            ->take($data['length'])
            ->get();

        $filtered = DB::table('events')
            ->where('name', 'like', '%' . $data['search']['value'] . '%')
            ->count();
        $returnData = collect(["draw" => $data['draw'], "recordsTotal" => DB::table('events')->count(), "recordsFiltered" => $filtered]);
        $arr = collect([]);
        foreach ($result as $res) {
            $option = '
            <button class="bg-blue-600 rounded text-white text-sm font-semibold uppercase p-2"><i class="fa-solid fa-pen"></i> Modify</button>
            <button class="bg-red rounded text-white text-sm font-semibold uppercase p-2" onclick = "deleteConfirm(' . $res->id . ')"><i class="fa-regular fa-circle-xmark"></i> Delete</button>';

            $arr->push([
                $res->name,
                $res->date,
                $option,
            ]);
        }

        $returnData->put('data', $arr);
        return response()->json($returnData);
    }

// Create
    function store(EventRequest $request)
    {

        $validated = $request->validated();
        $imgFile = $request->file("event_image");

        $event = new Event();
        $event = $this->buildEvent($event, $validated, $imgFile);
        $event->save();

        return view('backend.admin.events.create');
    }

// Update

    public function save(Request $request)
    {

        $name = $request["name"];
        $date = $request["date"];

        Validator::make($request->all(),[
            'name' => 'required|unique:name|date',
            'date' => 'required',
        ])->validate();

        $event = new Event();

        $event->name = $name;
        $event->date = $date;

        $event->save();
        Log::alert($name);
        Log::alert($date);

        return view("backend.admin.events.create");
    }

    // Delete
    public function delete($id)
    {
        Event::destroy($id);
        return response()->json("success");
    }

    public function create()
    {

        return view('backend.admin.events.create');
    }

    public function index(Request $request)
    {

        return view('backend.admin.events.index');
    }

    public function showAll(Request $request)
    {
        $years = DB::table('events')
            ->select(DB::raw('YEAR(date) as year'))
            ->distinct()
            ->orderBy('year', 'desc')
            ->get();

        if($request->has("event"))
            return view('frontend.events',[
                'events'=>Event::orderBy('date', 'desc')->take(3)->get(),
                'years'=>$years,
                'show_event_id'=>$request->query("event")
            ]);

        return view('frontend.events',[
            'events'=>Event::orderBy('date', 'desc')->take(3)->get(),
            'years'=>$years
        ]);
    }

}