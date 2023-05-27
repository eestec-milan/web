@extends('backend.layout')


@section('content')
    <div class="flex w-4/5 justify-right mx-20 ml-96 items-center h-1/2">
        <div class="bg-white p-6 mx-20 my-32 rounded-md w-full">
            <h3 class="text-base py-6 pt-6 md:text-4xl md:pt-10 font-bold md:pl-4 mb-10">
                ADD NEW EVENT
            </h3>
            @if($errors->any())
                <div class="bg-red text-white mb-6 rounded-lg p-5">
                    <i class="fa-solid fa-circle-exclamation"></i><span class="font-bold"> ERRORS</span>
                    <ul class="list-disc ml-5">

                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="bg-blue-600 text-white mb-6 rounded-lg p-5">
                <i class="fa-solid fa-circle-info"></i><span class="font-bold"> INFO</span>
                <li class="list-disc ml-5">
                    Image format: 1080x720, max: 512KB
                </li>
            </div>
            <form action = "{{route('event.create')}}" method="POST" class="pl-4 w-full" enctype="multipart/form-data">
                @csrf
                <div class="md:flex md:justify-items-start mb-6">
                    <div class="w-1/6 align-middle">
                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0" for="inline-full-name">
                            Event name
                        </label>
                    </div>
                    <div class="md:w-full">
                        <input name = "name" class="bg-white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" placeholder="Insert...">
                    </div>
                </div>
                <div class="md:flex md:justify-items-start mb-6">
                    <div class="w-1/6 align-middle">
                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0" for="inline-full-name">
                            Description
                        </label>
                    </div>
                    <div class="md:w-full">
                        <textarea name = "description" class="bg-white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" placeholder="Insert..."></textarea>
                    </div>
                </div>
                <div class="md:flex md:justify-items-start mb-6">
                    <div class="w-1/6 align-middle">
                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0" for="inline-full-name">
                            Location
                        </label>
                    </div>
                    <div class="md:w-full">
                        <input name = "location" type = "text" class="bg-white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" placeholder="Insert...">
                    </div>
                </div>
                <div class="md:flex md:justify-items-start mb-6">
                    <div class="w-1/6 align-middle">
                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0" for="inline-full-name">
                            Date
                        </label>
                    </div>
                    <div class="md:w-full">
                        <input name = "date" type = "date" class="bg-white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" placeholder="Insert...">
                    </div>
                </div>
                <div class="md:flex md:justify-items-start mb-6">
                    <div class="w-1/6 align-middle">
                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0" for="inline-full-name">
                            Image
                        </label>
                    </div>
                    <div class="md:w-full">
                        <input type = "file" name = "event_image" class="bg-white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type = "submit" class="shadow bg-red hover:bg-red-light focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded mt-10" type="button">
                        Add
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection