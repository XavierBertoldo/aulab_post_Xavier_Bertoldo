<x-main>
    <x-slot name="title">Form Rouolo</x-slot>
    <div class="container-fluid p-5 text-center">
        <div class="row justify-content-center">
            <h1 class="mt-5">
                Lavora con noi
            </h1>
        </div>
        <div class="mt-2">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
                <div class="container my-5">
                    <div class="text-center bg-danger text-white display-6 ">
                        !!Attenzione!!
                    </div>
                    <div class="border-start border-end border-2 ps-2">
                        <p><strong>Admin</strong>: <br> - Fate questa richiesta solo se autorizzati direttamente dall'amministratore!!</p>
                        <p><strong>Revisor</strong>: <br> - Richiedendo di diventare revisore automaticamente verrà sbloccata anche la sezione writer,
                             ma avrete degli obblighi e dei doveri. 
                             Dovrete vigilare affinchè nessun articolo possa avere contenuti spiacevoli. 
                             in caso contrario sarete ritenuti responsabili della pubblicazione al pari del writer che l'ha scritto!!</p>
                        <p><strong>Writer</strong>: <br> - Verrà sbloccata la possibilità di redarre articoli che verranno, pre pubblicazione, controllati
                        dai <strong>Revisor</strong>. <br>Condividete idee, create qui il vostro blog, ma sempre nel rispetto delle regole del sito!!  
                    </p>

                    </div>
                </div>
                <form class="card p-5 shadow border-0" action="{{route('careers.submit')}}" method="POST">
                    @csrf

                    {{-- Ruolo --}}
                    <div class="mb-3">
                        <label for="role">Per quale ruolo vuoi candidarti?</label>
                        <select name="role" id="role" class="form-control text-capitalize">
                                <option value="admin">Admin</option>
                                <option value="revisor">Revisor</option>
                                <option value="writer">Writer</option>
                        </select>

                    </div>

                    {{-- Nome --}}
                    <div class="mb-3">
                        <label for="name">Nome:</label>
                        <input type="text" name="name" class="form-control" id="name"
                            value="{{ old('name') }}">
                    </div>

                    {{-- Cognome --}}
                    <div class="mb-3">
                        <label for="surname">Cognome:</label>
                        <input type="text" name="surname" class="form-control" id="surname"
                            value="{{ old('surname') }}">
                    </div>
                    {{-- Email --}}
                    <div class="mb-3">
                        <label for="email">Email:</label>
                        <input type="text" name="email" class="form-control" id="email"
                            value="{{ Auth::user()->email }}">
                    </div>

                    {{-- Testo --}}
                    <div class="mb-3">
                        <label for="message">spiegaci la motivazione:</label>
                        <textarea type="text" name="message" cols="30" rows="7" class="form-control" id="message">{{ old('message') }}</textarea>

                    </div>

                    <div class="mt-2">
                        <button class="btn btn-info text-white">Invia</button>
                        <a href="{{ route('homepage') }}" class="btn btn-outline-info">Torna alla Home</a>
                    </div>

                </form>
            </div>
        </div>

    </div>
</x-main>