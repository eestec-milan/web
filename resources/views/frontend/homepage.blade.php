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

        <div class="flex justify-center mt-14 md:mx-40 ml:mx-60">
                <div class="grid grid-cols-1 grid-rows-2 gap-y-5">
                    <div class="grid grid-cols-12 gap-5">
                        <img src="{{asset("assets/images/img1.jpg")}}" class="object-none h-full col-start-1 col-end-5 rounded-lg">
                        <img src="{{asset("assets/images/img2.jpg")}}" class="object-none h-full col-start-5 col-end-10 rounded-lg">
                        <img src="{{asset("assets/images/img3.jpg")}}" class="object-none h-full col-start-10 col-end-13 rounded-lg">
                    </div>
                    <div class="grid grid-cols-12 gap-5">
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
                <a href="{{route('about')}}" class="mt4 justify-center text-s text-red">Check out more ...</a>
            </div>
        </div>

        <div class="justify-center mt-14">
            <div>
                <h1 class="text-center text-4xl text-white font-bold">EVENTS</h1>
            </div>
            <div class="flex flex-col gap-7 items-center justify-center p-5 pt-12 md:flex-row">
                <div class="flex flex-col text-center xt-sm mt-7 w-3/4 md:text-lg md:w-1/4 md:mt-0">
                    <img src="{{asset("assets/images/img4.jpg")}}" alt="" class="object-cover h-full rounded">
                    <h1 class="text-red mt-3 font-bold text-m md:text-xl">Title</h1>
                    <h2 class="text-gray-light text-s md:text-m">Event's description</h2>
                </div>
                <div class="flex flex-col text-center xt-sm mt-7 w-3/4 md:text-lg md:w-1/4 md:mt-0">
                    <img src="{{asset("assets/images/img4.jpg")}}" alt="" class="object-cover h-full rounded">
                    <h1 class="text-red mt-3 font-bold text-m md:text-xl">Title</h1>
                    <h2 class="text-gray-light text-s md:text-m">Event's description</h2>
                </div>
                <div class="flex flex-col text-center xt-sm mt-7 w-3/4 md:text-lg md:w-1/4 md:mt-0">
                    <img src="{{asset("assets/images/img4.jpg")}}" alt="" class="object-cover h-full rounded">
                    <h1 class="text-red mt-3 font-bold text-m md:text-xl">Title</h1>
                    <h2 class="text-gray-light text-s md:text-m">Event's description</h2>
                </div>
            </div>
        </div>

        <!--
        <div class="justify-center mt-14 md:mx-40">
            <div>
                <h1 class="text-center text-4xl text-white font-bold">EVENTS</h1>
            </div>

            <div class="grid grid-cols-2 grid-rows-3 gap-y-7 mt-7">

                <img class="w-full h-full" src="">

                <div class="bg-gray-dark overflow-hidden shadow-lg text-center">
                    <div class="px-4 py-2 mt-2">
                        <p class="text-l text-white font-medium">AUGUST&nbsp;25</p>
                    </div>
                    <div class="px-4 py-4">
                        <div class="font-bold text-xl text-red">Title</div>
                        <p class="text-gray-light text-l"> Event's description </p>
                    </div>
                </div>

                <img class="w-full h-full" src="">

                <div class="bg-gray-dark overflow-hidden shadow-lg text-center">
                    <div class="px-4 py-2 mt-2">
                        <p class="text-l text-white font-medium">AUGUST&nbsp;25</p>
                    </div>
                    <div class="px-4 py-4">
                        <div class="font-bold text-xl text-red">Title</div>
                        <p class="text-gray-light text-l"> Event's description </p>
                    </div>
                </div>

                <img class="w-full h-full" src="">

                <div class="bg-gray-dark overflow-hidden shadow-lg text-center">
                    <div class="px-4 py-2 mt-2">
                        <p class="text-l text-white font-medium">AUGUST&nbsp;25</p>
                    </div>
                    <div class="px-4 py-4">
                        <div class="font-bold text-xl text-red">Title</div>
                        <p class="text-gray-light text-l"> Event's description </p>
                    </div>
                </div>

            </div>
        </div>
        -->

        <div class="justify-center mt-12 md:mx-40">
            <div>
                <h1 class="text-center text-4xl text-white font-bold">SPONSORS</h1>
            </div>
            <div class="flex flex-wrap justify-start justify-center w-full mt-7">
                <img src="{{asset("assets/images/spns.png")}}" class="object-fill h-40 w-40 m-3">
                <img src="{{asset("assets/images/spns.png")}}" class="object-fill h-40 w-40 m-3">
                <img src="{{asset("assets/images/spns.png")}}" class="object-fill h-40 w-40 m-3">
                <img src="{{asset("assets/images/spns.png")}}" class="object-fill h-40 w-40 m-3">
                <img src="{{asset("assets/images/spns.png")}}" class="object-fill h-40 w-40 m-3">
                <img src="{{asset("assets/images/spns.png")}}" class="object-fill h-40 w-40 m-3">
            </div>
        </div>
    </div>
@endsection
