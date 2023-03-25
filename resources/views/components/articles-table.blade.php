<table class="table table-striped table-hover border">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titolo</th>
            <th scope="col">Sottotitolo</th>
            <th scope="col">Redattore</th>
            <th scope="col">Azioni</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articles as $article)
            <tr>
                <th scope="row">{{ $article->id }}</th>
                <td>{{ $article->title }}</td>
                <td>{{ $article->subtitle }}</td>
                <td>{{ $article->user->name }}</td>
                <td>
                    @if (is_null($article->is_accepted))
                        <div class="row">
                            <div class="col text-center w-50">
                                <a href="{{ route('articles.show', $article) }}" class="btn btn-info text-white">Leggi
                                    l'articolo</a>
                            </div>
                            <div class="col text-center w-50">
                                <a href="{{ route('revisor.acceptArticle', $article) }}"
                                    class="btn btn-success text-white">Accetta</a>
                            </div>
                            <div class="col text-center w-50">
                                <a href="{{ route('revisor.rejectArticle', $article) }}"
                                    class="btn btn-danger text-white">Rifiuta</a>
                            </div>
                        </div>
                    @else
                        <div class="col-12 text-center w-50">
                            <a href="{{ route('revisor.undoArticle', $article) }}"
                                class="btn btn-info text-white">Riporta in revisione</a>
                        </div>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
