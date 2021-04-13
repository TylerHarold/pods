@extends("layouts.auth.master")

@section("body")
    <div class="row justify-content-center m-3">
        <div class="col-md-1 col-sm-12">
            <label for='picture'>
                @if($user->avatar != null)
                    <label for="avatar">
                        <img src="{{ $user->avatar }}" style="width: 64px; height: 64px;"/>
                        <i class="fa fa-camera circle-icon"
                           style="z-index: 1; position: absolute; right: 10px; bottom: 10px; font-size: 18px;"></i>
                    </label>
                @else
                    <label for="avatar">
                        <img src="/img/default.png" style="width: 64px; height: 64px;"/>
                        <i class="fa fa-camera circle-icon"
                           style="z-index: 1; position: absolute; right: 10px; bottom: 10px; font-size: 18px;"></i>
                    </label>
                @endif
            </label>

            <form action="/settings/set-avatar" method="POST" style='display: none;'
                  enctype="multipart/form-data">>
                {{ csrf_field() }}
                <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}" />
                <input type="file" name="avatar" id="avatar" accept=".jpg,.png" onchange="this.form.submit();">
            </form>
        </div>
    </div>
@endsection
