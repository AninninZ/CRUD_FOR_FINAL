
@extends('layouts.default')
@section('page_name', 'Users Data')
@section('content')
    <!-- CODE HERE -->
    {{-- script สำหรับ การทำ modal sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css" rel="stylesheet">
    <div class="float-right pb-4">
        <a href="/homepage/create" class="btn btn-success"> Add User </a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <td width="35px">#</td>
                <td>Title</td>
                <td>name</td>
                <td>email</td>
                <td>avatar</td>
                <td width="150px">Tools</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($titles as $index => $value) { ?>
            <tr>
                <td>{{$index+1}}</td>
                <td>{{$value -> title}}</td>
                <td>{{$value -> name}}</td>
                <td>{{$value -> email}}</td>
                <td><img src="{{asset('storage'. $value-> avatar)}}" alt="" width="50%"></td>
                <td>
                    <a href="/homepage/{{$value -> id}}/edit" class="btn btn-warning">Edit</a>
                    <div>
                    {{-- //เมื่อกด button edit จะเรียกใช้ function edit --}}
                    <form action="/homepage/{{$value -> id}}" method="POST" name = "deleteForm">
                        @csrf
                        @method("DELETE")
                        <a  id ="deletebtn" class = "btn btn-danger">Delete</a>
                        
                        {{-- หน้าต่าง modal --}}
                        <script>
                            $('#deletebtn').click(function(){
                                Swal.fire({
                                    title: "Are you sure?",
                                    text: "You won't be able to revert this!",
                                    icon: "warning",
                                    showCancelButton: true,
                                    confirmButtonColor: "#3085d6",
                                    cancelButtonColor: "#d33",
                                    confirmButtonText: "Yes, delete it!"
                                    }).then((result) => {
                                    if (result.isConfirmed) {
                                        document.forms["deleteForm"].submit();
                                        // submit form อัตโนมัติ
                                    }
                                    });
                            })
                        </script>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
@endsection
