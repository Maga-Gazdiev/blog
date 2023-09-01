Ошибка в {{env('APP_NAME')}}
<b>Описание: </b> <code>{{$description}}</code>
<b>Файл:</b> <code>{{$file}}</code>
<b>Строка:</b> <code>{{$line}}</code>
@if(Auth::user())
<b>Пользователь:</b> <a href="t.me/{{Auth::user()->name}}">{{Auth::user()->name}}</a>
@endif