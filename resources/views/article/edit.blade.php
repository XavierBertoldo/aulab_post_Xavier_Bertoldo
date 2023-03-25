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

                <form class="card p-5 shadow border-0" action="{{ route('articles.update', $article) }}" method="POST" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    {{-- Categoria --}}
                    <div class="mb-3">
                        <label for="category">Categoria:</label>
                        <select name="category" id="category" class="form-control text-capitalize">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>

                    </div>

                    {{-- TItolo --}}
                    <div class="mb-3">
                        <label for="title">Titolo:</label>
                        <input type="text" name="title" class="form-control" id="title"
                            value="{{ $article->title }}">
                    </div>

                    {{-- SottoTitolo --}}
                    <div class="mb-3">
                        <label for="subtitle">Sottotitolo:</label>
                        <input type="text" name="subtitle" class="form-control" id="subtitle"
                            value="{{ $article->subtitle }}">
                    </div>
                    {{-- Testo --}}
                    <div class="mb-3">
                        <label for="body">Corpo del testo:</label>
                        <textarea type="text" name="body" cols="30" rows="7" class="form-control" id="body">{{ $article->body }}</textarea>

                    </div>

                    {{-- Immagine --}}
                    <div class="mb-3">
                        <label for="image">Immagine:</label>
                        <input type="file" name="image" class="form-control" id="image">
                    </div>

                    <div class="mt-2">
                        <button class="btn btn-info text-white">Salva</button>
                        <a href="{{ route('homepage') }}" class="btn btn-outline-info">Torna alla Home</a>
                    </div>
</x-main>