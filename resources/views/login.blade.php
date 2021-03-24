@extends("layouts.master")

@section("body")
    <div class="row" style="height: 100%; width: 100%;">
        <div class="col-md-6 col-sm-12">
            <img src="/img/patterns/favicon_purple.png" style="bottom: 0px; position: absolute; width: 100%;" />
        </div>
        <div class="col-md-6 col-sm-12 my-auto">
            <form class="m-5" method="POST" action="/login">
                {{ csrf_field() }}
                <h3>Login</h3>
                <br>
                <hr>
                <br><br>
                <input id="email" name="email" type="email" placeholder="Email" required />
                <br><br>
                <input id="password" name="password" type="password" placeholder="Password" required />
                <br><br><br>
                <a class="float-left mt-2" href="#" id="reset_password">Forgot your password?</a>
                <br><br>
                <input type="submit" class="btn btn-login btn-primary btn-block" value="Login" />
            </form>
        </div>
    </div>
@endsection
