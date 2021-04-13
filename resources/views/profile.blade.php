@extends("layouts.auth.master")

@section("body")
    <div class="row justify-content-center m-3">
        <div class="col-md-8 col-sm-12">
            <a class="float-right" href="/settings"><i class="fa fa-gear"></i></a>
            <h3>{{ $user->username }}</h3>

            <hr>
            <div class="row">
                @foreach($user->podUser as $podUser)
                    @foreach($podUser->pods as $pod)
                        @include("components.pod.preview", ["pod" => $pod])
                    @endforeach
                @endforeach
            </div>

        </div>

    </div>
@endsection
