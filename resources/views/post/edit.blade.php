@extends('layouts.app')

@section('content')

<main>
    <div class="body">
        <div class="list">
            <div class="pxls">
                <div class="mb-3 rigth"></div>
                <div class="group mb-5">
                    <h1>Изменить</h1>
                    <form method="POST" action="{{ route('posts.update', $post->id) }}" accept-charset="UTF-8" class="w-50">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <div class="form__group field">
                                <input type="input" class="form__field" placeholder="Name" name="name" id='name' required />
                                <label for="name" class="form__label">Имя</label>
                            </div>
                            <div class="mb-5 py-2"></div>
                            <div class="form__group field">
                                <input type="input" class="form__field" placeholder="Email" for="exampleFormControlTextarea1" id="body" name="body" required />
                                <label for="email" class="form__label" id="body" name="body" rows="3">Текст</label>
                            </div>
                        </div>
                        <div class="mb-5 py-2"></div>
                        <input class="button:hover button" type="submit" value="Обновить">
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection