<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Log in - ArturLearning</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="assets/css/Login-Form-Basic-icons.css">
</head>

<body>
@include('layouts.partials.navbar')
    <section class="py-4 py-md-5 my-5">
        <div class="container py-md-5">
            <div class="row">
                <div class="col-md-6 text-center"><img class="img-fluid w-100" src="assets/img/illustrations/register.svg"></div>
                <div class="col-md-5 col-xl-4 text-center text-md-start">
                    <h2 class="display-6 fw-bold mb-5"><span class="underline pb-1"><strong>Sign up</strong></span></h2>
                    <form method="post" action="{{ route('register.perform') }}">
                        {{ csrf_field() }}
                        <div class="mb-3"><input class="shadow-sm form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Email"></div>
                        <div class="mb-3"><input class="shadow-sm form-control" type="password" name="password" value="{{ old('password') }}" placeholder="Password"></div>
                        <div class="mb-3"><input class="shadow-sm form-control" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Repeat Password"></div>
                        <div class="mb-5"><button class="btn btn-primary shadow" type="submit">Create account</button></div>
                        <p class="text-muted">Have an account? <a href="login.html">Log in&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-arrow-narrow-right">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <line x1="15" y1="16" x2="19" y2="12"></line>
                                    <line x1="15" y1="8" x2="19" y2="12"></line>
                                </svg></a>&nbsp;</p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer></footer>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bold-and-bright.js"></script>
</body>

</html>
