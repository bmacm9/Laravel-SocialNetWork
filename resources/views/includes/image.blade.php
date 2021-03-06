<div class="card pub_image">
    <div class="card-header">
        @if($image->user->image)
            <div class = "container-avatar">
                <img src="{{ route('user.avatar', ['filename' => $image->user->image])}}" class="avatar">
            </div>
        @endif
        <div class="data-user">
            <a href="{{ route('profile', ['id' => $image->user->id]) }}">
                {{$image->user->nick. ' | ' . $image->user->name . ' ' . $image->user->surname }}
            </a>
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
            @include('includes.likes')
            <a href="{{ route('image.detail', ['id'=>$image->id]) }}" class="btn btn-warning btn-sm btn-comments">
                Comentarios ({{ count($image->comments) }})
            </a>
        </div>
    </div>
</div>
