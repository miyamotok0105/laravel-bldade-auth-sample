@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
                <div class="mb-0">
                    <a class="btn btn-block btn-social btn-facebook" onClick="socialSignin('facebook');">
                        <span class="fa fa-facebook"></span> Sign in with Facebook
                    </a>
                    <a class="btn btn-block btn-social btn-google"  onClick="socialSignin('google');">
                        <span class="fa fa-google"></span> Sign in with Google
                    </a>
                </div>
                <form id="social-login-form" action="" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    <input id="social-login-access-token" name="social-login-access-token" type="text">
                    <input id="social-login-tokenId" name="social-login-tokenId" type="text">
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-auth.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
// Initialize Firebase
var config = {
    // This is the variable you got from Firebase's Firebase SDK snippet. It includes values for apiKey, authDomain, projectId, etc.
};
firebase.initializeApp(config);
var facebookProvider = new firebase.auth.FacebookAuthProvider();
var googleProvider = new firebase.auth.GoogleAuthProvider();
var facebookCallbackLink = '/login/facebook/callback';
var googleCallbackLink = '/login/google/callback';
async function socialSignin(provider) {
    var socialProvider = null;
    if (provider == "facebook") {
        socialProvider = facebookProvider;
        document.getElementById('social-login-form').action = facebookCallbackLink;
        console.log("facebook");
    } else if (provider == "google") {
        socialProvider = googleProvider;
        document.getElementById('social-login-form').action = googleCallbackLink;
    } else {
        return;
    }
    firebase.auth().signInWithPopup(socialProvider).then(function(result) {
        console.log("return");
        console.log(result);
        result.user.getIdToken().then(function(result) {
            document.getElementById('social-login-tokenId').value = result;
            document.getElementById('social-login-form').submit();
        });
    }).catch(function(error) {
        // do error handling
        console.log(error);
    });
}
</script>
@endsection