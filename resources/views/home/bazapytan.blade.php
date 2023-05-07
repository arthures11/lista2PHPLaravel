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
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bold-and-bright.js"></script>
    <script src="assets/js/Table-With-Search.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
            <h1>Baza pytań     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">Dodaj pytanie</button></h1>
            <!-- Modal -->
            <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addUserModalLabel">Dodaj pytanie</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('pytania.add') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email">pytanie:</label>
                                    <input type="text" class="form-control" id="pytanie" name="pytanie" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">odpowiedź 1:</label>
                                    <input type="text" class="form-control" id="odp1" name="odp1" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">odpowiedź 2:</label>
                                    <input type="text" class="form-control" id="odp2" name="odp2" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">odpowiedź 3:</label>
                                    <input type="text" class="form-control" id="odp3" name="odp3" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">numer odpowiedzi prawidłowej:</label>
                                    <input type="number" class="form-control" id="prawidlowa" name="prawidlowa" required>
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
                                <th id="trs-hd-2" class="col-lg-2">pytanie</th>
                                <th id="trs-hd-3" class="col-lg-2">odpowiedź 1</th>
                                <th id="trs-hd-4" class="col-lg-2">odpowiedź 2</th>
                                <th id="trs-hd-4" class="col-lg-2">odpowiedź 3</th>
                                <th id="trs-hd-4" class="col-lg-1">prawidłowa</th>
                                <th id="trs-hd-5" class="col-lg-2"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($question_database as $q)
                            <tr>
                                <td>{{ $q->id }}</td>
                                <td contenteditable="true">{{ $q->pytanie }}</td>
                                <td contenteditable="true">{{ $q->odp1 }}</td>
                                <td contenteditable="true">{{ $q->odp2 }}</td>
                                <td contenteditable="true">{{ $q->odp3 }}</td>
                                <td contenteditable="true">{{ $q->prawidlowa }}</td>
                                <td style="text-align: center;"><button class="edit-btn btn btn-success" data-id="{{ $q->id }}"  style="margin-left: 5px;" type="submit"><i class="far fa-edit" style="font-size: 15px;"></i></button><button class="remove-btn btn btn-danger" data-id="{{ $q->id }}" style="margin-left: 5px;" type="submit"><i class="fa fa-trash" style="font-size: 15px;"></i></button></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <footer></footer>
<script>
    $(document).ready(function() {
        $('.edit-btn').click(function() {
            var btn = $(this);
            var id = btn.data('id');
            var row = btn.closest('tr');
            var pytanie = row.find('td:eq(1)').text();
            var odp1 = row.find('td:eq(2)').text();
            var odp2 = row.find('td:eq(3)').text();
            var odp3 = row.find('td:eq(4)').text();
            var prawidlowa = row.find('td:eq(5)').text();

            if (btn.hasClass('btn-success')) {
                // Przycisk "Edytuj"
                btn.removeClass('btn-success').addClass('btn-primary').html('<i class="fas fa-check"></i>');
                row.find('td:eq(1)').html('<input type="text" class="form-control" value="'+pytanie+'" />');
                row.find('td:eq(2)').html('<input type="text" class="form-control" value="'+odp1+'" />');
                row.find('td:eq(3)').html('<input type="text" class="form-control" value="'+odp2+'" />');
                row.find('td:eq(4)').html('<input type="text" class="form-control" value="'+odp3+'" />');
                row.find('td:eq(5)').html('<input type="text" class="form-control" value="'+prawidlowa+'" />');
            } else {
                // Przycisk "Zatwierdź"
                btn.removeClass('btn-primary').addClass('btn-success').html('<i class="far fa-edit"></i>');
                var newpytanie = row.find('td:eq(1) input').val();
                var newodp1 = row.find('td:eq(2) input').val();
                var newodp2 = row.find('td:eq(3) input').val();
                var newodp3 = row.find('td:eq(4) input').val();
                var newprawidlowa = row.find('td:eq(5) input').val();
                $.ajax({
                    url: '/pytania/'+id,
                    type: 'PUT',
                    data: {
                        pytanie: newpytanie,
                        odp1: newodp1,
                        odp2: newodp2,
                        odp3: newodp3,
                        prawidlowa: newprawidlowa,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function() {
                        row.find('td:eq(1)').html(newpytanie);
                        row.find('td:eq(2)').html(newodp1);
                        row.find('td:eq(3)').html(newodp2);
                        row.find('td:eq(4)').html(newodp3);
                        row.find('td:eq(5)').html(newprawidlowa);
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
<script>
    $(document).ready(function() {
        $('.remove-btn').click(function () {
            var btn = $(this);
            var id = btn.data('id');
            $.ajax({
                url: '/pytania/' + id,
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
</body>

</html>
