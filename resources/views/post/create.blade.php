@extends('layouts.app')

@section('content')

<main>
    <div class="body">
        <div class="list">
           <div class="pxls">
                <div class="mb-3 rigth"></div>
                <div class="group mb-5">
                    <h1>Создать пост</h1>
                    <form method="POST" action="{{ route('posts.store') }}" accept-charset="UTF-8" class="w-50">
                        @csrf
                        <div class="form-group mb-3">
                            <div class="form__group field">
                                <input type="input" class="form__field" placeholder="Name" name="name" id='name' required />
                                <label for="name" class="form__label">Название</label>
                            </div>
                            <div class="mb-5 py-2"></div>
                            <div class="form__group field">
                                <input type="input" class="form__field" placeholder="Описание" id="body" name="body"required />
                                <label for="body" class="form__label" id="body" name="body" rows="3">Описание</label>
                            </div>
                        </div>
                        <div class="mb-5 py-2"></div>
                        
                        <input class="button:hover button" type="submit" value="Создать">
                    </form>
                </div>
            </div> 
        </div>
    </div>
</main>
@endsection