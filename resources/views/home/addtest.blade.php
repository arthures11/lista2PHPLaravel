<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Testimonials - ArturLearning</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="assets/css/Login-Form-Basic-icons.css">
    <link rel="stylesheet" href="assets/css/Table-With-Search-search-table.css">
    <link rel="stylesheet" href="assets/css/Table-With-Search.css">
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bold-and-bright.js"></script>
    <script src="assets/js/Table-With-Search.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
@include('layouts.partials.navbar')
    <section class="py-5 mt-5">
        <div class="container py-5">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2 class="fw-bold">Dodaj test<span class="underline pb-2"></span></h2>
                </div>
            </div>
            <section class="position-relative py-4 py-xl-5">
                <div class="container">
                    <div class="card row">
                        <div class="col-md-12 col-xl-12">
                                <div class="card-body d-flex flex-column align-items-center">
                                    <form class="text-center" method="post" action="{{ route('addtest.add') }}">
                                        {{csrf_field()}}
                                        <div class="d-flex">
                                        <div class="mb-3"><input class="form-control" type="text" name="title" id="title" placeholder="nazwa testu"></div>
                                        <button type="button" id="modalbtn" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">
                                            Wybierz klasę lub użytkowników
                                        </button>
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalbtn">Wybierz klasę lub użytkowników</h5>
                                                            <button type="button" class="close" onclick="wybrano()" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @foreach($classes as $class)
                                                            <div class="form-check">
                                                                <input class="form-check-input class" type="checkbox" value="{{ $class }}" id="class_{{ $class }}">
                                                                <label class="form-check-label" for="class_{{ $class }}">
                                                                    {{ $class }}
                                                                </label>
                                                            </div>
                                                            @endforeach
                                                            <hr>
                                                            @foreach($users as $user)
                                                            <div class="form-check">
                                                                <input class="form-check-input user" type="checkbox" value="userr{{ $user->id }}" name ="userr{{ $user->id }}" id="user_{{ $user->klasa }}">
                                                                <label class="form-check-label" for="user_{{ $user->klasa }}">
                                                                    {{ $user->name }} ({{ $user->klasa }})
                                                                </label>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                                                            <button type="button" class="btn btn-primary" id="select_users" onclick="wybrano()" data-dismiss="modal">Wybierz</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>

                        </div>
                        <div class="col"><small class="form-text ">Baza pytań:</small>
                            @foreach($question_database as $question)
                            <div class="form-check"><input class="form-check-input" type="checkbox" id="ck{{$question->id}} "name="ck{{$question->id}}"><label class="form-check-label" for="formCheck-1">{{$question->pytanie}}</label></div>
                            @endforeach
                        </div>
                        <button class="btn btn-primary d-block w-100" type="submit">Zatwierdź</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </section>
    <footer></footer>
</body>
<script>
    $(document).ready(function() {
        $('.class').change(function () {
            var classValue = $(this).val();
            if ($(this).is(':checked')) {
                $('.user').each(function () {
                    if ($(this).attr('id').includes(classValue)) {
                        $(this).prop('checked', true);
                    }
                });
            } else {
                $('.user').each(function () {
                    if ($(this).attr('id').includes(classValue)) {
                        $(this).prop('checked', false);
                    }
                });
            }
        });

    });


    function wybrano(){
        $('.user').each(function () {
            if ($(this).prop('checked')){
                $('#modalbtn').text("wybrano")

            };
        });
    }

</script>

</html>
