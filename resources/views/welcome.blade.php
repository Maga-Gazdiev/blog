<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>


<div class="container-lg">
    @foreach($post->all() as $posts)
    <div class="container-lg">
        <div class="mb-3">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{ $posts->name }}</h2>
                </blockquote>
                <figcaption class="blockquote-footer text-dark">
                    {{ $posts->body }}
                </figcaption>
            </figure>
        </div>
    </div>
    @endforeach
</div>