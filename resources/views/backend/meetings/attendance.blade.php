@extends('backend.layout_noside')

@section('content')
    <div class="max-w-md w-full mx-auto">
        <div class="bg-white shadow-md rounded px-8 py-6">
            <h2 class="text-2xl font-bold mb-6">Attendance Form</h2>
            @if($errors->any())
                <div class="bg-red text-white mb-6 rounded-sm">
                    <i class="fa-solid fa-circle-exclamation"></i><span class="font-bold"> ERRORS</span>
                    <ul>

                        @foreach($errors->all() as $error)
                            {{$error}}
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(isset($success))
                <div class="bg-green-600 text-white mb-6 rounded-sm">
                    <i class="fa-solid fa-circle-exclamation"></i><span class="font-bold"> SUCCESS</span>
                    <ul>

                        @foreach($success->all() as $message)
                            {{$message}}
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{route('attendance.create',['meetingId'=>$meetingId])}}">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email Address</label>
                    <input id="email" name="email" type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <input type="hidden" id="meetingId" name="meetingId" value="{{$meetingId}}">
                </div>
                <div class="flex items-center justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('extra-scripts')

@endsection