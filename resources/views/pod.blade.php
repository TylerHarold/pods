@extends("layouts.master")

@section("body")
    <div class="row m-3">
        <div class="col-12">
            <br>
            <h3>{{ $pod->name }} <a href="/p/{{ $pod->id }}/settings"><i class="fa fa-gear"></i></a></h3>
            <p>{{ $pod->short_description }}</p>
            <hr>
        </div>
    </div>
    <br>
    <div class="row m-3">
        <div class="col-md-8 col-sm-12">
            @include("components.general.card", [
                "title" => "Info",
                "description" => $pod->long_description
            ])
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="card">
                <h5>Members</h5>
                <hr>
                @foreach($pod->members as $member)
                    <p>{{ $member->user->username }}</p>
                @endforeach
            </div>
        </div>
    </div>
@endsection
