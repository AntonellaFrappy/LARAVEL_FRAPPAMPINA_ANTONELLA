<div class="card">
    <div class="card-body">
        <div>
            @foreach($categories as $category)
            <span class="me-3">{{ $category->name }}</span>
            @endforeach
        </div>
        <div>{{ $title }}</div>
        <div class="mt-3 text-end">
            <a href="{{ $route }}">Leggi articolo</a>
        </div>
    </div>
</div>