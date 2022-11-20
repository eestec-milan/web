> The aim of this file is to provide you a sum up of the knowledge you need to start developing and good practice/guidelines to follow to develop in a team on Github.
> 
> If you need further documentation you may check the [wiki](https://laravel.com/docs/9.x) or the [offical video tutorial series](https://laracasts.com/series/laravel-8-from-scratch). Not enough? Just ask me!
# Table of contents
- [Laravel](#laravel)
  - [Request flow](#request-flow) 
     - [Routes](#routes) 
     - [Controllers](#controllers) 
     - [View](#view) 
- [Boostrap](#boostrap)
- [Git Flow](#git-flow)
# Laravel
The folders you should care about for this project are:
```
- app/Http/Controllers
- app/Http/Models
- database/migrations
- public/assets
- resources/views
- routes
- storage/app
- storage/logs
```
## Request flow
### Routes
The file `routes/web.php` is responsible for collecting and managing all the incoming HTTP requests.
In our case the file look like this:
```php
<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/events', [EventController::class, 'index']);


Route::get('/backend', function () {
    return view('backend.about');
});

```
The `Route` facade provides you methods to intercept the requests depending on the type (GET, POST, PATCH, etc.).
In the example, when the user types `website.com/about` will be executed the method `index` inside the controller `AboutController.php`.

You can have also an inline function, such as for `/backend`, but this is not suggested unless you have super-simple logic to implement.
The way to go is to have a separated Controller for each type of page. For example, an `EventController` will manage all the actions related to `show, index, store, delete` an event or a set of them.

The method names are not choose randomly but follow a precise convention described [here](https://laravel.com/docs/9.x/controllers#shallow-nesting).

[More about routing.](https://laravel.com/docs/9.x/routing)
### Controllers
Each controller owns the methods which implements the logic behind a request. Showing a page, storing or deleting something in the database, all of this is done in the controller.

To create a controller you use the command:
```
php artisan make:controller ExampleController
```
The file will be stored in `app/Http/Controllers` and is a PHP class that look like this:
```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        return view('frontend.event.index');
    }
    
    public function show($name)
    {
        return view('frontend.event.show', ['username' => $name]);
    }
}

```
In the example, we simply return the view `index.blade.php` stored in the folder `resources/views/event/frontend`, which is the template for then generate a html page.

[More about controllers.](https://laravel.com/docs/9.x/controllers)

### View
In `resources/views` you have all the blade template files, used to generate the html pages.
The views are splitted in `frontend` and `backend`. The former are used for the part of the website accessible by all the users, the latter are for administrative people in MESA.
The main structure is the same for both part of the website.

The generation of the HTML page start from the `return view('frontend.about')`. The file `about.blade.php` is read:

```
@extends('frontend.layout')

@section('title')
About us
@endsection


@section('content')

<--! html code !-->


@endsection

```
The operations behind the scenes are:

1. Check out `resources/views/frontend/layout.blade.php` and replace all the `@yield('field')` keyword with the content of every `@section('field')` in the `about.blade.php` file. In our example, two sections: `title`, `content`.
2. In `resources/views/frontend/layout.blade.php` include the files specified with `@include('filename')`. The `frontend/layout.blade.php`. 
    ```html
    <!DOCTYPE html>
    <html lang="en">
    
      <head>
    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
    
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
        <title>@yield('title')</title>
    
        <link rel="shortcut icon" href="{{asset('assets/img/favico.png')}}">
    
    
        <!-- Bootstrap core CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    
        <!-- Additional CSS Files -->
        <link rel="stylesheet" href="assets/frontend/css/fontawesome.css">
        <link rel="stylesheet" href="assets/frontend/css/templatemo-cyborg-gaming.css">
        <link rel="stylesheet" href="assets/frontend/css/owl.css">
        <link rel="stylesheet" href="assets/frontend/css/animate.css">
        <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    </head>
    
    <body>
    
      <!-- ***** Preloader Start ***** -->
      <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
          <span class="dot"></span>
          <div class="dots">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>
      </div>
      <!-- ***** Preloader End ***** -->
    
      <!-- ***** Header Area Start ***** -->
    @include('frontend.includes.navbar')
      <!-- ***** Header Area End ***** -->
    @yield('content')
    
    
    @include('frontend.includes.footer')
    
    
    
      <!-- Scripts -->
      <!-- Bootstrap core JavaScript -->
      <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
      <script src="assets/frontend/js/isotope.min.js"></script>
      <script src="assets/frontend/js/owl-carousel.js"></script>
      <script src="assets/frontend/js/tabs.js"></script>
      <script src="assets/frontend/js/popup.js"></script>
      <script src="assets/frontend/js/custom.js"></script>
    
    
      </body>
    
    </html>
    
    ```
This structure avoids html code repetitions. For every new page needed, we create the apposite route, then the method in the controller and finally the view.

[More about views.](https://laravel.com/docs/9.x/views)

<a name="boostrap"/></a>
# Boostrap
Boostrap is a toolkit that provides prebuilt grid systems and components for html pages. In this way we don't write raw CSS but instead use the provided CSS classes.

In this project there two different themes for frontend and backend.
1. [Frontend](https://drive.google.com/file/d/1951vZP5Zk6MFOe_6acoCPZtrdf5RJZra/view?usp=share_link) (there are some changes to do in the css to adapt the theme to design)
2. [Backend theme](https://drive.google.com/file/d/1gQAgtGjDKkhkKW61bcDnkUn5GDf13tuk/view?usp=share_link)

To add component in the page you're creating just inspect the theme files in the broswer and copy the snippet that you need.

<a name="git"/></a>
# Git Flow
You will be assigned to an issue where are specified the requirements for your task. Starting from the issue a new dev branch will be created and ONLY here you can commit your changes.

When the task is completed, you create a pull request from the dev branch to main. Then me or Babbolo will check the correctness and eventually merge it with the main branch.
