<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="/DataTables/datatables.css">
    <title>Employees</title>
</head>
<body>
    <div class="container">
        <h1>All Employees</h1>
        <a href="{{ URL::to('create-employee') }}" class="btn btn-outline-secondary">Add New Employee</a>
        <table id="table_id" class="table table-dark table-striped">
            <thead>
                 <tr>
                 <!-- <th >ID</th> -->
                    <th >Name</th>
                    <th >Email</th>
                    <th >AGE</th>
                    <th >SALARY</th>
                    <th> ACTION</th>
                    <!-- <th >Password</th> -->
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                <tr>
                    <!-- <th scope="row">{{$employee->id}}</th> -->
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->age}}</td>
                    <td>{{$employee->salary}}</td>
                    <td>
                        <a class="btn btn-outline-warning" href="{{ URL::to('edit-employee/' .$employee->id) }}">Edit</a>
                        <a class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#myModal{{ $employee->id }}" >Delete</a>
                        <div class="modal" id="myModal{{ $employee->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                 <div class="modal-header">
                                     <h4 class="modal-title">Delete Confirmed!</h4>
                                     <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body text-dark">
                                   Are You Sure You Want To Delete This Employee <b>{{ $employee->name }}</b>?
                                </div>
                                <div class="modal-footer">
                                    <a class="btn btn-danger" href="{{ URL::to('delete-employee/' .$employee->id) }}" >YES</a>
                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
             @endforeach
        </tbody>
    </table>
    </div>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.colVis.min.js"></script>
        <script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready( function () {
                $('#table_id').DataTable();
            } );
        </script>
</body>
</html>