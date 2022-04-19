<!doctype html>
<html>
<head>
   @include('includes.head')
   <title>Pay Parking: Users</title>
</head>
    <body>
        <div class="container">
            <header class="row">
                @include('includes.header')
            </header>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Phone No</th>
                        <th scope="col">Vehicle Registration No</th>
                        <th scope="col">Car Model</th>
                        <th scope="col">Creation Date</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->phone_no}}</td>
                            <td>{{$user->vehicle_reg_no}}</td>
                            <td>{{$user->car_model}}</td>
                            <td>{{$user->created_at}}</td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>