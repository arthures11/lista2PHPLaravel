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
<style>
    tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

</style>

<body>
@include('layouts.partials.navbar')
    <section class="py-5 mt-5"></section>
    <section class="py-5">
        <div class="container py-5">
            <h1>Uczniowie             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">Dodaj ucznia</button></h1>
            <!-- Modal -->
            <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addUserModalLabel">Dodaj ucznia</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('users.register') }}">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Hasło:</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Dodaj</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-12 search-table-col">
                <div class="form-group pull-right col-lg-4"><input type="text" class="search form-control" placeholder="szukaj"></div><span class="counter pull-right"></span>
                <div class="table-responsive table table-hover table-bordered results">

                    <table class="table table-hover table-bordered">
                        <thead class="bill-header cs">
                            <tr class="table-header">
                                <th id="trs-hd-1" class="col-lg-1">id</th>
                                <th id="trs-hd-2" class="col-lg-2">nazwa ucznia</th>
                                <th id="trs-hd-3" class="col-lg-3">email</th>
                                <th id="trs-hd-4" class="col-lg-1">klasa</th>
                                <th id="trs-hd-5" class="col-lg-3">wynik</th>
                                <th id="trs-hd-6" class="col-lg-2"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td contenteditable="true">{{ $user->name }}</td>
                                <td contenteditable="true">{{ $user->email }}</td>
                                <td contenteditable="true">{{ $user->klasa }}</td>
                                <td style="text-align: center;">
                                    @foreach($user->table_wyniki_testow as $test)
                                    @if($test->inprogress)
                                    {{$test->tytul}}- w trakcie<hr>
                                    @else
                                    {{$test->tytul}}-{{$test->wynik}}%<hr>
                                    @endif
                                    @endforeach
                                </td>
                                <td style="text-align: center;"><button class="edit-btn btn btn-success" data-id="{{ $user->id }}" style="margin-left: 0px;"><i class="far fa-edit" style="font-size: 15px;"></i></button><button class="remove-btn btn btn-danger" data-id="{{ $user->id }}" style="margin-left: 0px;" type="submit"><i class="fa fa-trash" style="font-size: 15px;"></i></button></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <footer></footer>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bold-and-bright.js"></script>
    <script src="assets/js/Table-With-Search.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('.edit-btn').click(function() {
            var btn = $(this);
            var id = btn.data('id');
            var row = btn.closest('tr');
            var name = row.find('td:eq(1)').text();
            var email = row.find('td:eq(2)').text();
            var klasa = row.find('td:eq(3)').text();

            if (btn.hasClass('btn-success')) {
                // Przycisk "Edytuj"
                btn.removeClass('btn-success').addClass('btn-primary').html('<i class="fas fa-check"></i>');
                row.find('td:eq(1)').html('<input type="text" class="form-control" value="'+name+'" />');
                row.find('td:eq(2)').html('<input type="text" class="form-control" value="'+email+'" />');
                row.find('td:eq(3)').html('<input type="text" class="form-control" value="'+klasa+'" />');
            } else {
                // Przycisk "Zatwierdź"
                btn.removeClass('btn-primary').addClass('btn-success').html('<i class="far fa-edit"></i>');
                var newName = row.find('td:eq(1) input').val();
                var newEmail = row.find('td:eq(2) input').val();
                var newKlasa = row.find('td:eq(3) input').val();
                $.ajax({
                    url: '/uczniowie/'+id,
                    type: 'PUT',
                    data: {
                        name: newName,
                        email: newEmail,
                        klasa: newKlasa,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function() {
                        row.find('td:eq(1)').html(newName);
                        row.find('td:eq(2)').html(newEmail);
                        row.find('td:eq(3)').html(newKlasa);
                    },
                    error: function() {
                        alert('Wystąpił błąd przy zapisywaniu zmian.');
                    }
                });
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.remove-btn').click(function () {
            var btn = $(this);
            var id = btn.data('id');
            $.ajax({
                url: '/uczniowie/' + id,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function () {
                },
                error: function () {
                    alert('Wystąpił błąd przy zapisywaniu zmian.');
                }
            });
            location.reload();
        });
    });
</script>
<script>
    $(document).ready(function(){
        $(".search").keyup(function(){
            var searchText = $(this).val().toLowerCase();
            var rowCount = 0;
            $(".table tbody tr").each(function(){
                var currentRowText = $(this).text().toLowerCase();
                if(currentRowText.indexOf(searchText) !== -1){
                    $(this).show();
                    rowCount++;
                }else{
                    $(this).hide();
                }
            });
            $(".counter").text("Liczba wyników: " + rowCount);
        });
    });
</script>

</body>

</html>
