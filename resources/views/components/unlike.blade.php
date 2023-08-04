<form action="{{ route('unlike', $postId) }}" method="post" class="border-0 bg-transparent">
    @csrf
    <button type="submit" class="border-0 bg-transparent"><i class="fa-solid fa-heart"></i></button>
</form>