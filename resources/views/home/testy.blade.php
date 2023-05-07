<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Services - ArturLearning</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Basic-icons.css">
    <link rel="stylesheet" href="assets/css/Table-With-Search-search-table.css">
    <link rel="stylesheet" href="assets/css/Table-With-Search.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
@include('layouts.partials.navbar')
    <section class="py-5 mt-5"></section>
    <section></section>
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-5"><img class="rounded img-fluid" src="assets/img/illustrations/presentation-2.svg"></div>
                <div class="col d-md-flex align-items-md-end align-items-lg-center mb-5">
                    <div class="row gy-4 row-cols-1 row-cols-md-2 flex-grow-1">
                        @foreach ($tests as $test)
                        <div class="col">
                            <div class="card border-light border-1 d-flex justify-content-center p-4">
                                <div class="card-body">
                                    <div>
                                        <h4 class="fw-bold">{{$test->tytul}}</h4>
                                        <p class="text-muted d-none d-xl-block">@if($test->inprogress)niewypełniony @else wynik testu: {{$test->wynik}}%@endif</p><a class="fw-bold link-primary" href="test/{{$test->id}}">&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-arrow-narrow-right fs-3">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                <line x1="15" y1="16" x2="19" y2="12"></line>
                                                <line x1="15" y1="8" x2="19" y2="12"></line>
                                            </svg></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
            </div>
        </div>
    </section>
    <footer></footer>
</body>

</html>
