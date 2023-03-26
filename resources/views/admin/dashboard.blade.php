<x-main>
    <x-slot name="title"> Amministrator Room</x-slot>
    <div class="container-fluid p-5 text-center">
        <div class="row justify-content-center">
            <h1 class="mt-5">
                Benvenuto, Amministratore
            </h1>
        </div>
    </div>
    <div class="mt-2">
        @if (session()->has('message'))
            <div class="alert alert-success text-center">
                {{ session('message') }}
            </div>
        @endif
    </div>

    <div class="container mt-5 shadow min-vh-100 pt-3">
        {{-- Amministrator request --}}
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2>Richieste per ruolo amministratore:</h2>
                    <x-requests-table :roleRequests="$adminRequests" role="amministratore" />
                </div>
            </div>
        </div>

        {{-- Revisor request --}}
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2>Richieste per ruolo Revisore:</h2>
                    <x-requests-table :roleRequests="$revisorRequests" role="revisore" />
                </div>
            </div>
        </div>

        {{-- Writer request --}}
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2>Richieste per ruolo redattore:</h2>
                    <x-requests-table :roleRequests="$writerRequests" role="redattore" />
                </div>
            </div>
        </div>

        {{-- Categorie --}}
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row mb-2">
                        <h2 class="col">Le categorie della piattaforma:</h2>
                        <form class="d-flex w-50" action="{{ route('admin.storeCategory') }}" method="POST">
                            @csrf
                            <input type="text" name="name" class="form-control me-2"
                                placeholder="Inserisci una nuova categoria">
                            <button class="btn btn-success text-white">Aggiungi</button>
                        </form>
                    </div>

                    <x-metainfo-table :metaInfos="$categories" metaType="categorie" />
                </div>
            </div>
        </div>

        {{-- Tags --}}
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2>I tags della piattaforma:</h2>
                    <x-metainfo-table :metaInfos="$tags" metaType="tags" />
                </div>
            </div>
        </div>



    </div>

</x-main>
