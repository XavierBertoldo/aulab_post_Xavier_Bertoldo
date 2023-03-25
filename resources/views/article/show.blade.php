<x-main>
    <x-slot name="title">{{$article->title}}</x-slot>
    <div class="container-fluid p-5 text-center ">
        <div class="row justify-content-center">
            <h1 class="mt-5">
                {{$article->title}}
            </h1>
        </div>
    </div>
    <div class="container shadow min-vh-100">
        <div class="row justify-content-around">
            <div class="col-12 col-md-8 text-center">
                <img src="{{Storage::url($article->image)}}" alt="immagine non presente" class="img-fluid mt-5 mb-3">
            <div class="text-center">
                <h2>{{$article->subtitle}}</h2>
            </div>
            <hr>
            <p>{{$article->body}}</p>
            <hr>
            <div class="my-3 text-muted fst-italic">
                Scritto il {{ $article->created_at->format('d/m/Y') }} da {{ $article->user->name }}
            </div>
            <div class="text-center">
                <a href="{{route('articles.index')}}" class="btn btn-info text-white my-5">Torna indietro</a>
            </div>
            </div>
        </div>
    </div>
</x-main>