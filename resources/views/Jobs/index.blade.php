@extends('layouts.app')

@section('content')

    @can('isAdmin')
        @foreach($data as $name)

            <div class="card">
                <div class="card-header">
                    <h3>{{$name->title}} </h3>
                </div>
                <div class="card-body">

                    {!! $name->description !!}
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <img class="card-img-top" alt="Card image cap">
                <div class="card-body">
                    <h3>{{$name->title}} </h3>
                    <p class="card-text"> {!! $name->description !!}</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        @endforeach


    @endcan

@endsection