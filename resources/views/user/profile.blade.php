@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="data-user">
                    <div class="col-md-4">
                        @if($user->image)
                            <div class = "container-avatar">
                                <img src="{{ route('user.avatar', ['filename' => $user->image])}}" class="image-profile" >
                            </div>
                        @endif
                    </div>
                    <div class="col-md-8">
                        <h1>{{ $user->nick }}</h1>
                        <h2>{{ $user->name.' '. $user->surname}}</h2>
                    </div>
                </div>

                @foreach($user->images as $image)
                    @include('includes.image', ['image' => $image])
                @endforeach

            </div>
        </div>
    </div>
@endsection
