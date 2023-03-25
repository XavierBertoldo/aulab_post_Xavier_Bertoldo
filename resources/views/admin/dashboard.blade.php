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
            <div class="alert alert-success">
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

    </div>

</x-main>
