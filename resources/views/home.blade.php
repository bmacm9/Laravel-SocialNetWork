@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('includes.message')

            @foreach($images as $image)
            <div class="card pub_image">
                <div class="card-header">
                    @if($image->user->image)
                        <div class = "container-avatar">
                            <img src="{{ route('user.avatar', ['filename' => $image->user->image])}}" class="avatar">
                        </div>
                    @endif
                    <div class="data-user">
                        {{$image->user->nick. ' | ' . $image->user->name . ' ' . $image->user->surname }}
                    </div>
                </div>
                <div class="card-body">
                    <div class="image-container">
                        <img src="{{ route('image.file', ['filename'=>$image->image_path]) }}">
                    </div>

                    <div class="description">
                        <span class="nickname">
                            {{ '@'.$image->user->nick }}
                        </span>
                        <div class ="content-description">
                            <p>
                                {{ $image->description }}
                            </p>
                            <p class="created-at">
                                {{ \FormatTime::LongTimeFilter($image->created_at) }}
                            </p>
                        </div>
                    </div>
                    <div class="comments">
                        <div class="likes">
                            <img src="{{ asset('img/heart-black.png') }}">
                        </div>
                        <a href="{{ route('image.detail', ['id'=>$image->id]) }}" class="btn btn-warning btn-sm btn-comments">
                            Comentarios ({{ count($image->comments) }})
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        <!-- Paginacion -->
            {{ $images->links() }}
        </div>
    </div>
</div>
@endsection
