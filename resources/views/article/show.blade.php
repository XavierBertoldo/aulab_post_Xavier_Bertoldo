<x-main>
    <x-slot name="title">{{ $article->title }}</x-slot>
    <div class="container-fluid p-5 text-center ">
        <div class="row justify-content-center">
            <h1 class="mt-5">
                {{ $article->title }}
            </h1>
        </div>
    </div>
    <div class="container shadow min-vh-100">
        <div class="row justify-content-around">
            <div class="col-12 col-md-8 text-center">
                <img src="{{ Storage::url($article->image) }}" alt="immagine non presente" class="img-fluid mt-5 mb-3">
                <div class="text-center">
                    <h2>{{ $article->subtitle }}</h2>
                            @if ($article->category)
                                <p>
                                    <a
                                        href="{{ route('articles.byCategory', ['category' => $article->category->id]) }}"class="small text-muted fst-italic text-capitalize">
                                        {{ $article->category->name }}
                                    </a>
                                </p>
                            @else
                                <p class="small text-muted fst-italic text-capitalize">
                                    Non Categorizzato
                                </p>
                            @endif
                </div>
                <hr>
                <p>{{ $article->body }}</p>
                <hr>
                <div class="my-3 ">
                    <p class="small fst-italic text-capitalize">
                        @foreach ($article->tags as $tag)
                            #{{ $tag->name }}
                        @endforeach
                    </p>
                </div>
                <div class="my-3 text-muted fst-italic">
                    Scritto il {{ $article->created_at->format('d/m/Y') }} da {{ $article->user->name }}
                </div>
                <div class="text-center">
                    <a href="{{ route('articles.index') }}" class="btn btn-info text-white my-5">Torna indietro</a>
                </div>
            </div>
        </div>
        @if (Auth::user() && Auth::user()->is_revisor)
            @if (is_null($article->is_accepted))
                <div class="row">
                    <div class="col text-center">
                        <a href="{{ route('articles.show', $article) }}" class="btn btn-info text-white">Leggi
                            l'articolo</a>
                    </div>
                    <div class="col text-center">
                        <a href="{{ route('revisor.acceptArticle', $article) }}"
                            class="btn btn-success text-white">Accetta</a>
                    </div>
                    <div class="col text-center">
                        <a href="{{ route('revisor.rejectArticle', $article) }}"
                            class="btn btn-danger text-white">Rifiuta</a>
                    </div>
                </div>
            @else
                <div class="col-12  text-center">
                    <a href="{{ route('revisor.undoArticle', $article) }}" class="btn btn-info text-white">Riporta in
                        revisione</a>
                </div>
            @endif
        @endif
    </div>
</x-main>
