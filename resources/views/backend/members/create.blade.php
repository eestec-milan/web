@extends('backend.layout')


@section('content')
    <div class="flex w-4/5 justify-right mx-20 ml-96 items-center h-1/2">
        <div class="bg-white p-6 mx-20 my-32 rounded-md w-full">
            <h3 class="text-base py-6 pt-6 md:text-4xl md:pt-10 font-bold md:pl-4 mb-10">
                ADD NEW MEMBER
            </h3>
            @if($errors->any())
                <div class="bg-red text-white mb-6 rounded-lg p-5">
                    <i class="fa-solid fa-circle-exclamation"></i><span class="font-bold"> ERRORS</span>
                    <ul>

                @foreach($errors->all() as $error)
                     {{$error}}
                @endforeach
                    </ul>
                </div>
            @endif
            <form action = "{{route('member.create')}}" method="POST" class="pl-4 w-full">
                @csrf
                <div class="md:flex md:justify-items-start mb-6">
                    <div class="w-1/6 align-middle">
                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0" for="inline-full-name">
                            First name
                        </label>
                    </div>
                    <div class="md:w-full">
                        <input name = "firstname" class="bg-white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" placeholder="Insert...">
                    </div>
                </div>
                <div class="md:flex md:justify-items-start mb-6">
                    <div class="w-1/6 align-middle">
                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0" for="inline-full-name">
                            Last name
                        </label>
                    </div>
                    <div class="md:w-full">
                        <input name = "lastname" class="bg-white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" placeholder="Insert...">
                    </div>
                </div>
                <div class="md:flex md:justify-items-start mb-6">
                    <div class="w-1/6 align-middle">
                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0" for="inline-password">
                            Email
                        </label>
                    </div>
                    <div class="md:w-full">
                        <input type = "email" name = "email" class="bg-white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="text" placeholder="Insert...">
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