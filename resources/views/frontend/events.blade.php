@extends('frontend.layout')

@section('title')
    Events
@endsection


@section('content')



    <div class="mx-60  pt-12">
        <div class="flex">
            <select class="block appearance-none search-year w-full bg-white border-0 hover:border-gray-500 accent-red w-2/12 px-4 py-2 pr-8 rounded-l-md shadow leading-tight focus:border-0 focus:ring-0">
                <option class="rounded-0" value="0">All years</option>
                @foreach($years as $year)<option class="rounded-0">{{$year->year}}</option> @endforeach
            </select>
            <div class="relative w-full">
                <label class="relative block">
                    <input
                        class="w-full bg-white placeholder:font-italitc border-0 drop-shadow-md rounded-r-md py-2 search-event pl-3 pr-10 focus:border-0 focus:ring-0"
                        placeholder="Search..." type="text" />
                    <button class="absolute inset-y-0 right-0 flex items-center px-3 bg-red rounded-r-md">
                         <svg class="h-5 w-5 fill-black" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 30 30">
                            <path d="M 13 3 C 7.4889971 3 3 7.4889971 3 13 C 3 18.511003 7.4889971 23 13 23 C 15.396508 23 17.597385 22.148986 19.322266 20.736328 L 25.292969 26.707031 A 1.0001 1.0001 0 1 0 26.707031 25.292969 L 20.736328 19.322266 C 22.148986 17.597385 23 15.396508 23 13 C 23 7.4889971 18.511003 3 13 3 z M 13 5 C 17.430123 5 21 8.5698774 21 13 C 21 17.430123 17.430123 21 13 21 C 8.5698774 21 5 17.430123 5 13 C 5 8.5698774 8.5698774 5 13 5 z">
                            </path>
                        </svg>
                    </button>
                </label>
            </div>
        </div>
    </div>



    <div class="grid grid-cols-4 mx-32 md:my-20" id="events-gallery">

        @foreach($events as $event)
        <div class="event-card mx-4" >
            <div class="max-w-sm justify-center bg-gray-dark border border-gray-dark rounded-lg shadow dark:bg-gray-dark dark:border-gray-dark md:my-6">
                <a href="#">
                    <img class="rounded-lg rounded-b-none" src="{{asset('assets/frontend/images/gattini-foto-19.jpg')}}" alt="" />
                </a>
                <div class="flex justify-between p-3">
                    <div class="w-2/5 text-center font-bold p-2 align-middle"><p class="text-red font-bold text-sm md:text-lg event-year">{{\Carbon\Carbon::parse($event->date)->translatedFormat('Y')}}</p>
                        <p class="text-xs md:text-sm text-white">{{\Carbon\Carbon::parse($event->date)->translatedFormat('d M')}}</p></div>
                    <div class="w-3/5 text-left text-white p-1 md:p-2 align-middle md:mt-1"><p><span class="font-bold event-name">{{$event->location}}</span></p>
                        <p class="text-xs md:mt-1 text-gray">Via Brombeis NAPOLI</p></div>
                </div>
            </div>
        </div>
        @endforeach

        <div class="p-5">

        </div>

    </div>

    <button class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id')">
        Open regular modal
    </button>
    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id">
        <div class="relative w-auto my-6 mx-auto max-w-3xl">
            <!--content-->
            <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                <!--header-->
                <div class="flex items-start justify-between p-5 border-b border-solid border-slate-200 rounded-t">
                    <h3 class="text-3xl font-semibold">
                        Modal Title
                    </h3>
                    <button class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-id')">
          <span class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
            ×
          </span>
                    </button>
                </div>
                <!--body-->
                <div class="relative p-6 flex-auto">
                    <p class="my-4 text-slate-500 text-lg leading-relaxed">
                        I always felt like I could do anything. That’s the main
                        thing people are controlled by! Thoughts- their perception
                        of themselves! They're slowed down by their perception of
                        themselves. If you're taught you can’t do anything, you
                        won’t do anything. I was taught I could do everything.
                    </p>
                </div>
                <!--footer-->
                <div class="flex items-center justify-end p-6 border-t border-solid border-slate-200 rounded-b">
                    <button class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id')">
                        Close
                    </button>
                    <button class="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id')">
                        Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>

@endsection

@section('extra-scripts')
    <script
        src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
        crossorigin="anonymous"></script>
<script src="{{asset("assets/js/shufflejs/dist/shuffle.js")}}"></script>
<script>
    let shuffleInstance;
    const Shuffle = window.Shuffle; // Assumes you're using the UMD version of Shuffle (for example, from unpkg.com).        $(document).ready(function() {
    $(document).ready(function() {
    $(".search-event").val('');
    const element = document.getElementById('events-gallery');

    shuffleInstance = new Shuffle(element, {
        itemSelector: '.event-card',
        speed: 1000
    });

    });
    document.querySelector('.search-event').addEventListener('keyup', handleSearchKeyup);
    document.querySelector('.search-year').addEventListener('change', handleSearchYear);

    function handleSearchYear(event){
        const searchYear = event.target.value;

        shuffleInstance.filter((element, shuffle) => {
            const titleElement = element.querySelector('.event-year');
            const titleText = titleElement.textContent;

            if(searchYear == 0)
                return true;

            return titleText.includes(searchYear);
        });
    }

    function handleSearchKeyup(event) {
        // Filter the shuffle instance by items with a title that matches the search input.        function handleSearchKeyup(event) {
        const searchText = event.target.value.toLowerCase();

        shuffleInstance.filter((element, shuffle) => {
            const titleElement = element.querySelector('.event-name');
            const titleText = titleElement.textContent.toLowerCase().trim();

            return titleText.includes(searchText);
        });
        /*
        $("#course-number").html(shuffleInstance.visibleItems + " corsi");
        if(shuffleInstance.visibleItems == 0)
            $("#course-notfound").removeClass('visually-hidden');
        else                $("#course-notfound").addClass('visually-hidden');
        }
        */
    }
</script>

    <script type="text/javascript">
        function toggleModal(modalID){
            document.getElementById(modalID).classList.toggle("hidden");
            document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
            document.getElementById(modalID).classList.toggle("flex");
            document.getElementById(modalID + "-backdrop").classList.toggle("flex");
        }
    </script>
@endsection
