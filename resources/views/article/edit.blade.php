<x-main>
    <x-slot name='title'>Modifica Articolo</x-slot>
    <div class="container-fluid p-5 text-center">
        <div class="row justify-content-center mt-5">
            <h1>
                Modifica articolo
            </h1>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-6 mx-auto">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="card p-5 shadow border-0" action="{{ route('articles.update', $article) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    {{-- Categoria --}}
                    <div class="mb-3">
                        <label for="category" class="form-label">Categoria:</label>
                        <select name="category" id="category" class="form-control text-capitalize">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if($article->category && $category->id == $article->category->id) selected @endif>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>

                    </div>

                    {{-- Titolo --}}
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo:</label>
                        <input type="text" name="title" class="form-control" id="title"
                            value="{{ $article->title }}">
                    </div>

                    {{-- SottoTitolo --}}
                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Sottotitolo:</label>
                        <input type="text" name="subtitle" class="form-control" id="subtitle"
                            value="{{ $article->subtitle }}">
                    </div>


                    {{-- Testo --}}
                    <div class="mb-3">
                        <label for="body" class="form-label">Corpo del testo:</label>
                        <textarea type="text" name="body" cols="30" rows="7" class="form-control" id="body">{{ $article->body }}</textarea>

                    </div>

                    {{-- Tags --}}
                    <div class="mb-3">
                        <label for="tags" class="form-label">Tags:</label>
                        <input name="tags" class="form-control" id="tags"
                            value="{{ $article->tags->implode('name', ', ') }}">
                        <span class="small fst-italic">Dividi ogni tag con una virgola</span>
                    </div>

                    {{-- Immagine --}}
                    <div class="mb-3">
                        <label for="image" class="form-label">Immagine:</label>
                        <input type="file" name="image" class="form-control" id="image">
                    </div>

                    <div class="mt-2">
                        <button class="btn btn-info text-white">Salva</button>
                        <a href="{{ route('homepage') }}" class="btn btn-outline-info">Torna alla Home</a>
                    </div>
</x-main>
