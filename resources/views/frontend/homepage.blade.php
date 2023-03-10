@extends('frontend.layout')

@section('title')
Homepage
@endsection


@section('content')
    <div class="bg-black text-white p-4">
        <div class="flex justify-center">
            <h1 class="text-center text-4xl font-bold">
                <span class="text-red">LEARN.&nbsp;</span> <span class="text-white">TRAVEL.&nbsp;</span>
                <span class="text-red">MAKE FRIENDS.&nbsp;</span> <span class="text-white">IMPROVE YOURSELF.</span>
            </h1>
        </div>

        <div class="flex justify-center mt-14 md:mx-40">
                <div class="grid grid-cols-1 grid-rows-2 gap-y-5">
                    <div class="grid grid-cols-12 gap-5">
                        <img src="{{asset("assets/images/img1.jpg")}}" class="object-none h-full col-start-1 col-end-5 rounded-lg">
                        <img src="{{asset("assets/images/img2.jpg")}}" class="object-none h-full col-start-5 col-end-10 rounded-lg">
                        <img src="{{asset("assets/images/img3.jpg")}}" class="object-none h-full col-start-10 col-end-13 rounded-lg">
                    </div>
                    <div class="ms:mx-40 mx-50 grid grid-cols-12 gap-5">
                        <img src="{{asset("assets/images/img4.jpg")}}" class="object-none h-full col-start-1 col-end-4 rounded-lg">
                        <img src="{{asset("assets/images/img5.jpg")}}" class="object-none h-full col-start-4 col-end-8 rounded-lg">
                        <img src="{{asset("assets/images/img6.jpg")}}" class="object-none h-full col-start-8 col-end-13 rounded-lg">
                    </div>
                </div>
        </div>

        <div class="justify-center mt-14 md:mx-40">
            <div>
                <h1 class="text-center text-4xl text-white font-bold">ABOUT US</h1>
            </div>
            <div class="justify-center text-center mt-7">
                <p class="justify-center text-s text-white mt-6"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br> Integer iaculis sagittis tellus sit amet mattis.
                    In sit amet leo non ligula vestibulum vestibulum. <br> Pellentesque ac dui arcu. Sed pellentesque ligula non ipsum ullamcorper,
                    elementum convallis augue accumsan. Suspendisse potenti. <br> Curabitur ac leo at tellus auctor imperdiet. Etiam nec interdum augue.
                    In pretium massa libero, et semper diam laoreet non.</p>
                <a href="about.blade.php" class="mt4 justify-center text-s text-red">Check out more ...</a>
            </div>
        </div>

        <div class="justify-center mt-14 md:mx-40">
            <div>
                <h1 class="text-center text-4xl text-white font-bold">EVENTS</h1>
            </div>
            <div class="grid grid-cols-3 grid-rows-1 gap-5 mt-7">
                <div class="bg-gray-dark rounded overflow-hidden shadow-lg">
                    <img class="w-full" src="{{asset("assets/images/img1.jpg")}}">
                    <div class="flex">
                        <div class="text-center flex items-center justify-center w-24">
                            <div class="px-4 py-4">
                                <div class="text-s text-white font-medium">AUG</div>
                                <div class="text-s text-white font-bold">25</div>
                            </div>
                        </div>
                        <div class="px-4 py-4">
                            <div class="font-bold text-m text-white">Title</div>
                        </div>
                    </div>
                    <div class="items-center justify-center text-center w-full py-4">
                        <p class="text-gray-light text-xs"> Event's description </p>
                    </div>
                </div>

                <div class="bg-gray-dark rounded overflow-hidden shadow-lg">
                    <img class="w-full" src="{{asset("assets/images/img1.jpg")}}">
                    <div class="flex">
                        <div class="text-center flex items-center justify-center w-24">
                            <div class="px-4 py-4">
                                <div class="text-s text-white font-medium">AUG</div>
                                <div class="text-s text-white font-bold">25</div>
                            </div>
                        </div>
                        <div class="px-4 py-4">
                            <div class="font-bold text-s text-white mb-2">Title</div>
                            <p class="text-gray-light text-xs"> Event's description </p>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-dark rounded overflow-hidden shadow-lg">
                    <img class="w-full" src="{{asset("assets/images/img1.jpg")}}">
                    <div class="flex">
                        <div class="text-center flex items-center justify-center w-24">
                            <div class="px-4 py-4">
                                <div class="text-s text-white font-medium">AUG</div>
                                <div class="text-s text-white font-bold">25</div>
                            </div>
                        </div>
                        <div class="px-4 py-4">
                            <div class="font-bold text-s text-white mb-2">Title</div>
                            <p class="text-gray-light text-xs"> Event's description </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="justify-center mt-12 md:mx-40">
            <div>
                <h1 class="text-center text-4xl text-white font-bold">SPONSORS</h1>
            </div>
        </div>
    </div>
@endsection
