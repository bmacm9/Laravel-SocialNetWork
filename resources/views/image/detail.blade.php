@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @include('includes.message')

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
                            <p>{{ $image->description }}</p>
                        </div>
                        <div class="comments">
                            @include('includes.likes')
                            <h2 class="h2-comments">
                                Comentarios ({{ count($image->comments) }})
                            </h2>
                        </div>
                        <div class="form-comments">
                            <hr/>
                            <form class="form-comments" method="post" action="{{ route('comment.save') }}">
                                @csrf
                                <input type="hidden" name="image_id" value="{{ $image->id }}">
                                <p>
                                    <textarea class="form-control" name="content" required></textarea>
                                </p>
                                <button type="submit" class="btn btn-success">
                                    Enviar
                                </button>
                            </form>
                            <hr/>

                            @foreach($image->comments as $comment)
                                <div class="comment">
                                    <span class="nickname">{{ '@'.$comment->user->nick }}</span>
                                    <span class = "nickname date">{{ ' | '.\FormatTime::LongTimeFilter($comment->created_at) }}</span>
                                    @if(Auth::check() && ($comment->user_id == Auth::user()->id || $comment->image->user_id == Auth::user()->id))
                                        <a class="btn btn-sm btn-danger" href="{{ route('comment.delete', [ 'id' => $comment->id]) }}">Eliminar</a>
                                    @endif
                                    <p>{{ $comment->content }}</p>
                                    <hr/>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
