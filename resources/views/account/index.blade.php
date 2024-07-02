<x-layout title="Account">
    <div class="container mt-5">
        <h1>Benvenuto {{ auth()->user()->name }}</h1>
        <p class="lead">{{ auth()->user()->email }}</p>
    </div>
</x-layout>