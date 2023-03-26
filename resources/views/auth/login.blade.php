<x-main>
    <x-slot name="title">Accedi</x-slot>
    <div class="container mt-5 shadow mb-5">
        <div class="row">
            <div class="col-6 mx-auto">
                <h1 class="my-3 text-center">Accedi</h1>
                @if (session()->has('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
                <form action="/login" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control"
                                value="{{ old('email') }}">
                        </div>
                        <div class="col-12">
                            <label for="password">password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="col-12">
                            <a href="/forgot-password">hai dimenticato la passowrd?</a>
                        </div>

                        <div class="mb-5">
                            <button type="submit " class="btn btn-primary">Accedi</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-main>

