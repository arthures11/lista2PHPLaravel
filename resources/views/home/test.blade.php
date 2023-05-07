<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Contacts - ArturLearning</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css?family=Raleway:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Login-Form-Basic-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Table-With-Search-search-table.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Table-With-Search.css') }}">
    <script src="{{ asset('https://code.jquery.com/jquery-3.3.1.slim.min.js') }}" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js') }}" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js') }}" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/bold-and-bright.js') }}"></script>
    <script src="{{ asset('assets/js/Table-With-Search.js') }}"></script>
    <script src="{{ asset('https://code.jquery.com/jquery-3.6.4.min.js') }}"></script>
</head>

<body>
@include('layouts.partials.navbar')
    <section class="py-5 mt-5">
        <div class="container py-5">
            <div class="row">
                @if($rep)
                <div class="col-md-24 col-xl-24 text-center mx-auto">
                    @else
                    <div class="col-md-8 col-xl-8 text-center mx-auto">
                        @endif
                    @if(!$rep)
                    <form method="POST" action="{{ route('sprawdzOdpowiedzi') }}">
                        @csrf
                    @foreach($test as $t)
                    <h2 class="display-6 fw-bold mb-4">{{$t->pytanie}}</h2>
                    <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-{{ $t->id }}-{{ $loop->index }}" name="odp{{ $t->id }}"value="{{$t->odp1}}" required><label class="form-check-label" for="formCheck-{{ $t->id }}-{{ $loop->index }}">{{$t->odp1}}</label></div>
                    <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-{{ $t->id }}-{{ $loop->index }}" name="odp{{ $t->id }}"value="{{$t->odp2}}" required><label class="form-check-label" for="formCheck-{{ $t->id }}-{{ $loop->index }}">{{$t->odp2}}</label></div>
                    <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-{{ $t->id }}-{{ $loop->index }}" name="odp{{ $t->id }}" value="{{$t->odp3}}" required><label class="form-check-label" for="formCheck-{{ $t->id }}-{{ $loop->index }}">{{$t->odp3}}</label></div>
                    @endforeach
                        <button type="submit" class="btn btn-primary">Zatwierdź</button>
                    </form>
                </div>
            </div>
            @else

            <h2 id="raport">{{$rep}}</h2>
            @endif
            <div class="row d-flex justify-content-center">
                <div class="col-md-6">
                    <div></div>
                </div>
            </div>
    </section>
    <footer></footer>
</body>
<script>
    var abc = $('#raport').html();
    var abc = abc.replaceAll("\n", "<hr>")
    $('#raport').html(abc);
</script>

</html>
