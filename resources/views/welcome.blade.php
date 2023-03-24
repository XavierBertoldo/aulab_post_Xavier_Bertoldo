<x-main>
    <x-slot name="title">The Aulab Post|Home</x-slot>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
</x-main>
