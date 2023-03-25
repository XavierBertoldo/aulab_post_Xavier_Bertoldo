<x-main>
    <x-slot name="title">Articoli di {{Auth::user()->name}}</x-slot>
    <div class="container-fluid p-5 text-center ">
        <div class="row justify-content-center">
            <h1 class="mt-5">
               Articoli
            </h1>
            @if (session()->has('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        </div>
    </div>
    <div class="container my-5 shadow min-vh-100"> 
        <ul>
            <div class="row fw-bold display-6 mb-3">
                <div class="col-4 text-center ">
                    <p>Immagine</p>
                </div>
                <div class="col-4 text-center ">
                    <p>titolo</p>
                </div>
                <div class="col-2 text-center ">
                    <p>categoria</p>
                </div>
            </div>
            @foreach ($articles as $article)
                <div class="row border-top py-3">
                    <div class="col-4 text-center ">
                        <img src="{{Storage::url($article->image)}}" alt="" class="img-fluid ms-0 w-75">
                    </div>
                    <div class="col-4  text-center align-self-center ">
                        <h3>
                        <a class="nav-link fw-bold  " href="{{ route('articles.show', $article) }}">{{ $article->title }}</a>
                    </h3>
                    </div>
                    <div class="col-2  text-center align-self-center">  
                        <a href="{{ route('articles.byCategory', ['category' => $article->category->id]) }}"
                            class=" nav-link fst-italic text-capitalize">{{ $article->category->name }}</a>      
                    </div> 
                        <div class="col-2 text-center align-self-center  ">
                            <a class="btn btn-info my-1" href="{{ route('articles.edit', $article) }}">Modifica</a>
                            <form action="{{ route('articles.destroy', $article) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger my-1 ">elimina</button>
                            </form>
                        </div>
                </div>
            @endforeach
        </ul>
    </div>
</x-main>

