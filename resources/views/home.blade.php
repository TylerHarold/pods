@extends("layouts.auth.master")

@section("body")
    <div class="row m-3">
        <div class="col-12">
            <br>
            <h3>Your Pods</h3>
            <hr>
        </div>

        @foreach($pods as $pod)
            @include("components.pod.preview", ["pod" => $pod])
        @endforeach
    </div>
@endsection
