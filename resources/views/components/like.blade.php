<form action="{{ route('like', $postId) }}" method="post" class="border-0 bg-transparent">
    @csrf
    <button type="submit" class="border-0 bg-transparent"><i class="fa-sharp fa-regular fa-heart fs-5"></i></button>
</form>