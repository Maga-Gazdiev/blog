<form action="{{ route('like.comment', $postId) }}" method="post" class="border-0 bg-transparent">
    @csrf
    <button type="submit" class="border-0 bg-transparent"><i class="fa-sharp fa-regular fa-heart"></i></button>
</form>