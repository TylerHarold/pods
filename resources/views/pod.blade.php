@extends("layouts.auth.master")

@section("pageTitle")
{{ $pod->name }}
@endsection

@section("body")
    <div class="row no-gutters">
        <div class="col-md-2 col-sm-12" style="height: 80vh;">
            @include("components.general.card", [
                "title" => "Info",
                "description" => $pod->long_description
            ])
            <div class="card h-100">
                <h5>Members</h5>
                @foreach($pod->members as $member)
                    <p><img src="{{ $member->user->avatar }}" width="48px" height="48px" /> {{ $member->user->username }}</p>
                @endforeach
            </div>
        </div>
        @include("components.pod.chat")
    </div>
@endsection
