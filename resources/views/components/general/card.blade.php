<div class="card">
    @if ($title != null)
        <h5>{{ $title }}</h5>
        <hr>
    @endif
    @if ($description != null)
        <p>{{ $description }}</p>
    @endif
</div>
