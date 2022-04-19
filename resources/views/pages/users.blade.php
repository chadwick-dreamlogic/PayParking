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

            <div class="my-1">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createUserModal">
                    Create User
                </button>
            </div>

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
                            <td><div class="row">
                                    <span class="mr-1">
                                        <button type="submit" class="btn btn-primary" onclick="updateValues({{$user}});" 
                                            data-toggle="modal" data-target="#updateUserModal">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </span>
                                    <span class="ml-1">
                                        <form action="/admin/delete-user/{{$user->id}}" method="POST">
                                            <input type="hidden" name="_method" value="delete">
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </span>     
                                </div>      </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>

    <!-- Create User Modal -->
    <div class="modal fade" id="createUserModal" tabindex="-1" role="dialog"
        aria-labelledby="createUserModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createUserModalTitle">Create User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/admin/create-user" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-label" for="nameTextField"> Name
                                <input type="text" class="form-control" id="nameTextField" name="name"
                                    placeholder="User Name" required>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="passwordField"> Password
                                <input type="password" class="form-control" id="passwordField" name="password"
                                    placeholder="User Name" required>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="phoneTextField"> Phone
                                <input type="text" class="form-control" id="phoneTextField" name="phone_no"
                                    placeholder="User Phone Number" required>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="vehicleRegNoTextField"> Vehicle Registration Number
                                <input type="text" class="form-control" id="vehicleRegNoTextField" name="vehicle_reg_no"
                                    placeholder="User Vehicle Registration No" required>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="carModelTextField"> Car Model
                                <input type="text" class="form-control" id="carModelTextField" name="car_model"
                                    placeholder="User Car Model" required>
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary" type="submit">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Update User Modal -->
    <div class="modal fade" id="updateUserModal" tabindex="-2" role="dialog" aria-labelledby="updateUserModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateUserModalTitle">Update User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="updateUserForm" method="post">
                    <input type="hidden" name="_method" value="put">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-label" for="updateNameTextField"> Name
                                <input type="text" class="form-control" id="updateNameTextField" name="name"
                                    placeholder="User Name" required>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="updatePhoneTextField"> Phone
                                <input type="text" class="form-control" id="updatePhoneTextField" name="phone_no"
                                    placeholder="User Phone Number" required>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="updateVehicleRegNoTextField"> Vehicle Registration Number
                                <input type="text" class="form-control" id="updateVehicleRegNoTextField" name="vehicle_reg_no"
                                    placeholder="User Vehicle Registration No" required>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="updateCarModelTextField"> Car Model
                                <input type="text" class="form-control" id="updateCarModelTextField" name="car_model"
                                    placeholder="User Car Model" required>
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</html>
<script>
    function updateValues(user) {
        document.getElementById("updateUserForm").action                = "/admin/update-user/"+user.id
        document.getElementById("updateNameTextField").value            = user.name;
        document.getElementById("updatePhoneTextField").value           = user.phone_no;
        document.getElementById("updateVehicleRegNoTextField").value    = user.vehicle_reg_no;
        document.getElementById("updateCarModelTextField").value        = user.car_model;        
    }
</script>