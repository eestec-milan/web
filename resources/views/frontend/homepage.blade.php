@extends('frontend.layout')

@section('title')
Homepage
@endsection


@section('content')
    <div class="flex flex-col justify-center text-white p-6 md:my-10">

    <div class="bg-black text-white p-4">
        <div class="flex justify-center">
            <h1 class="text-center text-4xl md:pt-6 mb-4 font-bold">
                <span class="text-red">LEARN.&nbsp;</span> <span class="text-white">TRAVEL.&nbsp;</span>
                <span class="text-red">MAKE FRIENDS.&nbsp;</span> <span class="text-white">IMPROVE YOURSELF.</span>
            </h1>
        </div>

        <div class="flex justify-center mt-14 md:mx-40 ml:mx-60">
                <div class="grid grid-cols-1 grid-rows-2 gap-y-5">
                    <div class="grid grid-cols-12 gap-5">
                        <img src="{{asset("assets/images/people/img1.jpg")}}" class="object-center object-cover h-full col-start-1 col-end-5 rounded-lg">
                        <img src="{{asset("assets/images/people/img2.jpg")}}" class="object-center object-cover h-full col-start-5 col-end-10 rounded-lg">
                        <img src="{{asset("assets/images/people/img3.jpg")}}" class="object-center object-cover h-full col-start-10 col-end-13 rounded-lg">
                    </div>
                    <div class="grid grid-cols-12 gap-5">
                        <img src="{{asset("assets/images/people/img4.jpg")}}" class="object-center object-cover h-full col-start-1 col-end-4 rounded-lg">
                        <img src="{{asset("assets/images/people/img5.jpg")}}" class="object-center object-cover h-full col-start-4 col-end-8 rounded-lg">
                        <img src="{{asset("assets/images/people/img6.jpg")}}" class="object-center object-cover h-full col-start-8 col-end-13 rounded-lg">
                    </div>
                </div>
        </div>

        <div class="flex flex-col justify-center text-white p-6 md:my-10">

            <div class="pt-6 pb-20 md:pt-10">
                <h1 class="text-center md:-4xl font-bold">ABOUT US</h1>
                <p class="text-lg text-s md:text-lg text-center p-3 md:px-8 md:mt-5 md:mx-40"><span class="font-bold text-red">MESA</span> - Milan Engineering Student Association - is a non-profit and apolitical organization
                    with almost 100 active members and more than 1000 passive members, from all of the engineering faculties at Politecnico di Milano. <br><a href="{{route('about')}}" class="link" >Check out more ...</a></p>

            </div>
        </div>

        <div class="justify-center my-20">
            <div>
                <h1 class="text-center text-4xl text-white font-bold mt-20">EVENTS</h1>
            </div>
            <div class="grid grid-cols-3 mx-32 mt-7" id="events-gallery">

                @foreach($events as $event)
                    <a href="{{route('events')}}?event={{$event->id}}">
                        <div class="event-card mx-4 cursor-pointer" id="event-{{$event->id}}">
                            <div class="max-w-sm justify-center bg-gray-dark border border-gray-dark rounded-lg shadow dark:bg-gray-dark dark:border-gray-dark md:my-6">
                                <img class="object-cover rounded-lg rounded-b-none" src="{{$event->image}}" alt="" />
                                <div class="flex justify-between p-3">
                                    <div class="w-2/5 text-center font-bold p-2 align-middle"><p class="text-red font-bold text-sm md:text-lg event-year">{{\Carbon\Carbon::parse($event->date)->translatedFormat('Y')}}</p>
                                        <p class="text-xs md:text-sm text-white">{{\Carbon\Carbon::parse($event->date)->translatedFormat('d M')}}</p></div>
                                    <div class="w-3/5 text-left text-white p-1 md:p-2 align-middle md:mt-1"><p><span class="font-bold event-name">{{$event->name}}</span></p>
                                        <p class="text-xs md:mt-1 text-gray">{{$event->location}}</p></div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
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

        <div class="justify-center mb-16 md:mx-40 md:mt-20">
            <div>
                <h1 class="text-center text-4xl text-white font-bold">PARTNERS</h1>
            </div>
            <div class="flex flex-wrap justify-start justify-center w-full mt-7">
                <a href="https://www.a2aenergia.eu/" target="_blank"><img src="{{asset("assets/images/partners/a2a.svg")}}" class="object-fill h-40 w-40 m-3"></a>
                <a href="https://bendingspoons.com/" target="_blank"><img src="{{asset("assets/images/partners/bending_spoons.png")}}" class="object-fill h-40 w-40 m-3"></a>
                <a href="https://www.cefriel.com/" target="_blank"><img src="{{asset("assets/images/partners/cefriel.png")}}" class="object-fill h-40 w-40 m-3"></a>
                <a href="https://www.esselunga.it/cms/homepage.html" target="_blank"><img src="{{asset("assets/images/partners/esselunga.svg")}}" class="object-fill h-40 w-40 m-3"></a>
                <a href="https://www.gft.com/it/it" target="_blank"><img src="{{asset("assets/images/partners/gft.svg")}}" class="object-fill h-40 w-40 m-3"></a>
                <a href="https://www.haier-europe.com/" target="_blank"><img src="{{asset("assets/images/partners/haier.svg")}}" class="object-fill h-40 w-40 m-3"></a>
                <a href="https://havasmediagroup.com/" target="_blank"><img src="{{asset("assets/images/partners/havas.svg")}}" class="object-fill h-40 w-40 m-3"></a>
                <a href="https://www.infineon.com/" target="_blank"><img src="{{asset("assets/images/partners/infineon.svg")}}" class="object-fill h-40 w-40 m-3"></a>
                <a href="https://www.redbull.com" target="_blank"><img src="{{asset("assets/images/partners/redbull.svg")}}" class="object-fill h-40 w-40 m-3"></a>
            </div>
        </div>
    </div>
@endsection


