<x-main>
    <x-slot name="title">Registrati</x-slot>
    <div class="container mt-5 shadow pb-5">
        <h1 class="text-center mt-5">Registrati</h1>
        <div class="row">
            <div class="col-6 mx-auto">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
                <form action="/register" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="name">name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ old('name') }}">
                        </div>
                        <div class="col-12">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                value="{{ old('email') }}">
                        </div>

                        <div class="col-12">
                            <label for="password">password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="col-12">
                            <label for="password_confirmation">password confirmation</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control">
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary">Registrati</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-main>
