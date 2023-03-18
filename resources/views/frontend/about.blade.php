@extends('frontend.layout')

@section('title')
About us
@endsection


@section('content')
<!--
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="page-content">
        <div class="game-details">
            <div class="row">
              <div class="col-lg-12">
                  <h2>WHO ARE WE? </h2>
              </div>
              <div class="col-lg-12">
                <p class="text-white" style="text-align: center; margin-top: -10px; margin-bottom: 10px"> MESA - Milan Engineering Student Association - is a non-profit and apolitical organization
                    with almost 100 active members<br> and more than 1000 passive members, from all of the engineering faculties at Politecnico di Milano.<br>
                        MESA is part of a bigger association called EESTEC - Electrical Engineering Students’ European Association - <br>that has branches all around Europe,
                            collaborating with 43 universities in 24 countries.</p>
              </div>
              <div class="row mt-5">
                <div class="col-lg-4">
                    <img src="assets/frontend/images/about1.jpg" alt="" style="border-radius: 20px; margin-bottom: 30px;">
                    <p><h2><span class="red-text" style="color: red">100</span><br>MEMBERS</h2></p></div>
                <div class="col-lg-4">
                    <img src="assets/frontend/images/about2.jpg" alt="" style="border-radius: 20px; margin-bottom: 30px;">
                    <p><h2><span class="red-text" style="color: red">43</span><br>UNIVERSITIES</h2></p></div>
                <div class="col-lg-4">
                    <img src="assets/frontend/images/about3.jpg" alt="" style="border-radius: 20px; margin-bottom: 30px;">
                    <p><h2><span class="red-text" style="color: red">69420</span><br>NUMBERS</h2></p> </div>
              </div>
              <div class="col-lg-12">
                  <h2>WHAT DO WE DO? </h2>
                  <p class="text-white" style="text-align: center; margin-top: -10px">Our hh goal is the improvement of hard and soft skills through local and international events,<br>
                      such as: training hh sessions, team working, hackathons, workshops, challenges and much more.
                  </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>-->

<div class="flex flex-col justify-center text-white p-6 md:my-10">

    <h1 class="text-center text-lg pt-6 md:text-4xl md:pt-10 mb-4 font-bold">WHO ARE WE?</h1>
    <p class="text-lg text-xs md:text-lg text-center p-3 md:px-8 md:mt-3 md:mx-40"><span class="font-bold">MESA</span> - Milan Engineering Student Association - is a non-profit and apolitical organization
        with almost 100 active members and more than 1000 passive members, from all of the engineering faculties at Politecnico di Milano. </p>
    <p class="text-lg text-xs md:text-lg text-center px-3 md:px-5 md:mt-3 md:mx-40">
        MESA is also part of a bigger association called <span class="font-bold">EESTEC</span> - Electrical Engineering Students’ European Association - that has branches all around Europe,
        collaborating with <span class="font-bold">43 universities</span> in <span class="font-bold">24 countries</span>.
    </p>

    <div class="flex flex-col gap-12 items-center justify-center p-5 pt-12 mt-12 md:flex-row">
        <div class="flex flex-col text-base text-center font-bold md:text-lg md:w-1/4">
            <img src="assets/frontend/images/about1.jpg" alt="" class="object-cover h-full rounded">
            <h1 class="mt-4 md:text-4xl md:mt-32"><span class="text-red">100</span><br>MEMBERS</h1>
        </div>
        <div class="flex flex-col font-bold mt-9 text-center text-sm md:text-lg md:w-1/4 md:mt-0">
            <img src="assets/frontend/images/about2.jpg" alt="" class="object-cover h-full rounded">
            <h1 class="mt-4 md:text-4xl md:mt-32"><span class="text-red">43</span><br>UNIVERSITIES</h1>
        </div>
        <div class="flex flex-col font-bold mt-9 text-center xt-sm md:text-lg md:w-1/4 md:mt-0">
            <img src="assets/frontend/images/about3.jpg" alt="" class="object-cover h-full rounded">
            <h1 class="mt-4 md:text-4xl md:mt-32"><span class="text-red">69420</span><br>NUMBERS</h1>
        </div>
    </div>

    <h1 class="text-center mb-4 font-bold pt-28 md:text-4xl">WHAT DO WE DO?</h1>
    <p class="text-xs md:text-lg text-center pb-10 my-5 md:mx-40">Our goal is the improvement of hard and soft skills through local and international events,
            such as: training sessions, team working, hackathons, workshops, challenges and much more.
    </p>

    <h1 class="text-center mb-4 font-bold pt-12 md:text-4xl">PROJECTS</h1>

    <div class="flex flex-col gap-12 items-center justify-center p-5 pt-12 mt-4 md:flex-row">

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

    <h1 class="text-center mb-4 font-bold pt-32 pb-6 md:text-4xl">CONTACT US</h1>


    <form class="bg-gray-dark md:px-24 px-8 md:py-14 py-10 mb-16 rounded-2xl mx-auto md:w-1/2">
        <div class="mb-6">
            <!--<label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>-->
            <input type="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Email" required>
        </div>
        <div class="mb-6">

            <input type="subject" id="subject" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Subject" required>
        </div>
        <div class="mb-6">

            <textarea rows="6" id="message" class="resize-none shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Message" required></textarea>
        </div>
        <div class="flex items-start mb-6">
            <div class="flex items-center h-5">
                <input id="terms" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required>
            </div>
            <label for="terms" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">I agree with the <a href="#" class="text-blue-600 hover:underline dark:text-blue-500 font-bold">Terms and Conditions</a></label>
        </div>
        <div class="text-center">
            <button type="submit" class="text-white bg-red hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </div>
    </form>
</div>

@endsection
