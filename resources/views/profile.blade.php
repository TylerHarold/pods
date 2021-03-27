@extends("layouts.master")

@section("body")
    <div class="row m-3">
        <div class="col-12">
            <br>
            <h3>{{ $user->username}}</h3>
            <hr>
        </div>
    </div>

    <div class="row m-3">
        <div class="col-12">
            <h3>{{ $user->username }}'s Pods</h3>
            <hr>
        </div>
        @foreach($user->podUser as $podUser)
            @foreach($podUser->pods as $pod)
                @include("components.pod.preview", ["pod" => $pod])
            @endforeach
        @endforeach
    </div>
@endsection
