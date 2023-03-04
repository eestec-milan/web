@extends('backend.layout')


@section('content')


            <form action="{{route("updateEvent", ["id"=>"1"])}}">
                @csrf

                <input name="name" />
                <input name="date" type="datetime-local"/>
                <input name="location"/>
                <input name="description"/>
                <input type="submit" value="submit"/>
            </form>

@endsection
