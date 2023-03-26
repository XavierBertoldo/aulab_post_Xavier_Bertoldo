<x-main>
    <x-slot name="title">Logged-in</x-slot>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header fw-bold text-center">!!VERIFICA IL TUO ACCOUNT!!</div>

                        <div class="card-body ps-5">
                            prima di procedere Verifica il tuo Account dalla mail che hai ricevuto
                            <br>
                            non hai ricevuto la mail?
                            <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                                @csrf
                                <button type="submit" class="btn btn-outline-info  p-2 m-2">clicca qui per riceverne
                                    un altra subito!!!</button>
                            </form>
                            @if (session('status'))
                                <div class="alert alert-success mt-3 mb-0" role="alert">
                                    una nuova mail di notifica è stata inviata al tuo indirizzo
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
   
</x-main>
