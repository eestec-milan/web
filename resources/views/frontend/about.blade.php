@extends('frontend.layout')

@section('title')
About us
@endsection


@section('content')

<div class="flex flex-col justify-center text-white p-6 md:my-10">

    <div class="pt-6 pb-20 md:pt-10">
        <h1 class="text-center md:-4xl font-bold">WHO ARE WE?</h1>
            <p class="text-lg text-s md:text-lg text-center p-3 md:px-8 md:mt-5 md:mx-40"><span class="font-bold text-red">MESA</span> - Milan Engineering Student Association - is a non-profit and apolitical organization
                with almost 100 active members and more than 1000 passive members, from all of the engineering faculties at Politecnico di Milano. </p>
            <p class="text-lg text-s md:text-lg text-center px-3 md:px-5 md:mt-3 md:mx-40">
                MESA is also part of a bigger association called <span class="font-bold text-red">EESTEC</span> - Electrical Engineering Students’ European Association - that has branches all around Europe,
                collaborating with <span class="font-bold text-red">43 universities</span> in <span class="font-bold text-red">24 countries</span>.
            </p>
    </div>

    <div class="flex flex-col gap-12 items-center justify-center p-5 py-20 md:flex-row">
        <div class="flex flex-col text-base text-center font-bold md:text-lg md:w-1/4">
            <img src="assets/frontend/images/about1.jpg" alt="" class="object-cover h-full rounded">
            <h1 class="mt-4 md:text-4xl md:mt-20"><span class="text-red">100</span><br>MEMBERS</h1>
        </div>
        <div class="flex flex-col font-bold mt-9 text-center text-sm md:text-lg md:w-1/4 md:mt-0">
            <img src="assets/frontend/images/about2.jpg" alt="" class="object-cover h-full rounded">
            <h1 class="mt-4 md:text-4xl md:mt-20"><span class="text-red">43</span><br>UNIVERSITIES</h1>
        </div>
        <div class="flex flex-col font-bold mt-9 text-center xt-sm md:text-lg md:w-1/4 md:mt-0">
            <img src="assets/frontend/images/about3.jpg" alt="" class="object-cover h-full rounded">
            <h1 class="mt-4 md:text-4xl md:mt-20"><span class="text-red">69420</span><br>NUMBERS</h1>
        </div>
    </div>

    <div class="py-20">
        <span><h1 class="text-center font-bold md:mt-5 md:text-4xl">WHAT DO WE DO?</h1></span>
        <p class="text-s md:text-lg text-center my-5 md:mx-40">Our goal is the improvement of hard and soft skills through local and international events,
                such as: training sessions, team working, hackathons, workshops, challenges and much more.
        </p>
    </div>

    <div class="py-20">
        <h1 class="text-center font-bold md:text-4xl">PROJECTS</h1>
        <div class="flex flex-col gap-12 items-center justify-center p-5 md:flex-row">

            <div class="flex flex-col text-base text-center font-bold md:text-lg md:w-1/4">
                <a class="text-3xl font-bold leading-none" href="#">
                    <img src="https://www.spaziogames.it/images/images/2022/08/spider-man-kermit-mod-49755.1200x675.jpg" alt="" class="object-cover h-full rounded">
                </a>
                <p class="text-center font-bold pt-8">sium</p>
            </div>
            <div class="flex flex-col text-base text-center font-bold pt-5 md:text-lg md:w-1/4">
                <a class="text-3xl font-bold leading-none" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstley">
                    <img src="https://www.gattolicesimo.it/wp-content/uploads/2020/12/gattini-che-soffiano.jpg" alt="" class="object-cover h-full rounded">
                </a>
                <p class="text-center font-bold pt-8">sk</p>
            </div>
            <div class="flex flex-col text-base text-center font-bold pt-5 md:text-lg md:w-1/4">
                <a class="text-3xl font-bold leading-none" href="#">
                    <img src="https://media-assets.wired.it/photos/615c5674be48be4873e7e6e2/master/w_1200,h_710,c_limit/f0f58d56-74c0-46b8-a14a-6f7c26cbf28a.jpg" alt="" class="object-cover h-full rounded">
                </a>
                <p class="text-center font-bold pt-8">nice</p>
            </div>
        </div>
    </div>
    <h1 class="text-center font-bold pt-32 pb-6 md:text-4xl">CONTACT US</h1>


    <form class="bg-gray-dark md:px-24 px-8 md:py-12 py-10 mb-16 rounded-2xl mx-auto md:w-1/2">
        <div class="mb-6">
            <!--<label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>-->
            <input type="email" id="email" class="shadow-sm border text-gray-900 text-sm rounded-lg focus:ring-0 block w-full p-3" placeholder="Email" required>
        </div>
        <div class="mb-6">

            <input type="subject" id="subject" class="shadow-sm border text-gray-900 text-sm rounded-lg focus:ring-0 block w-full p-3" placeholder="Subject" required>
        </div>
        <div class="mb-6">

            <textarea rows="6" id="message" class="resize-none shadow-sm border text-gray-900 text-sm rounded-lg focus:ring-0 block w-full p-3" placeholder="Message" required></textarea>
        </div>
        <div class="flex items-start mb-6">
            <div class="flex items-center h-5">
                <input id="terms" type="checkbox" value="" class="w-4 h-4 border border-black rounded-md focus:ring-0 hover:bg-red checked:bg-red checked:border-red" required>
                <label for="terms" class="ml-2">I agree with the <a href="#" class="text-red font-bold">Terms and Conditions</a></label>
            </div>
        </div>
        <div class="flex items-center justify-center">
            <button type="button" class="bg-red rounded text-white text-base font-semibold uppercase p-3">Send email</button>
        </div>
    </form>
</div>

@endsection
