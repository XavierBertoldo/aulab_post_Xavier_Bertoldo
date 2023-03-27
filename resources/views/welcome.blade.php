<x-main>
    <x-slot name="title">The Aulab Post|Home</x-slot>
    <div class="mt-2">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <div class="container my-5 min-vh-100 shadow ">
        <div class="row justify-content-around ">
            @forelse ($articles as $article)
                <div class="col-12 col-md-3 d-flex mt-3 ">
                    <div class="card">
                        <img src="{{ Storage::url($article->image) }}" alt="immagine non presente" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ $article->subtitle }}</p>
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
                        <div>
                            <p class="small fst-italic text-capitalize text-center bg-light mb-0 py-2">
                                @if (count($article->tags) > 2)
                                    @foreach ($article->tags->take(2) as $tag)
                                        #{{ $tag->name }}
                                    @endforeach
                                    ...
                                @else
                                    @foreach ($article->tags as $tag)
                                        #{{ $tag->name }}
                                    @endforeach
                                @endif
                            </p>
                        </div>
                        <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                            Scritto il {{ $article->created_at->format('d/m/Y') }} da <a
                                href="{{ route('article.byUser', $article->user->id) }}">{{ $article->user->name }}</a>
                        </div>
                        <div class="ps-2 bg-light">
                            <span class="text-muted small fst-italic">- tempo di lettura {{ $article->readDuration() }}
                                min</span>
                        </div>
                        <div class="w-100 text-center my-2">
                            <a href="{{ route('articles.show', $article) }}"
                                class="btn btn-info text-white w-50">Leggi</a>
                        </div>


                    </div>
                </div>
            @empty
                    <div class="text-center p-5 shadow bg-light ">
                        <h2>Non Sono ancora stati inseriti articoli, sii tu il primo fatti avanti e clicca qui:</h2>
                        <a href="{{ route('articles.create') }}" class="btn btn-outline-info">Crea articolo</a>
                    </div>
            @endforelse

        </div>
    </div>
</x-main>
