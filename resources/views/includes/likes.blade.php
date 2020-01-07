<div class="likes">
    <span class="number-likes">{{ count($image->likes) }}</span>
    <?php $user_like = false; ?>
    @foreach($image->likes as $like)
        @if($like->user->id == Auth::user()->id)
            <?php $user_like = true; ?>
        @endif
    @endforeach

    @if($user_like)
        <img src="{{ asset('img/heart-red.png') }}" data-id="{{ $image->id }}" class="btn-dislike">

    @else
        <img src="{{ asset('img/heart-black.png') }}" data-id="{{ $image->id }}" class="btn-like">
    @endif

</div>
