<!doctype html>
<html>
<head>
   @include('includes.head')
   <title>Pay Parking: Users</title>
</head>
    <body>
        <div class="wrapper">
            @include('includes.header')
            <div id="content" class="container-fluid">
                <div class="my-1">
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#createUserModal">
                        Create User
                    </button>
                </div>

                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Username</th>
                            <th scope="col">Phone No</th>
                            <th scope="col">Creation Date</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr onclick="getUserTransactions({{$user}});">
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->phone_no}}</td>
                                <td>{{$user->created_at}}</td>
                                <td><div class="row">
                                        <span class="mr-1">
                                            <button type="submit" class="btn btn-primary"
                                                onclick="updateValues({{$user}});" 
                                                data-toggle="modal" data-target="#updateUserModal">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </span>
                                        <span class="ml-1">
                                            <button type="submit" class="btn btn-danger"
                                                onclick="confirmDelete({{$user}});"
                                                data-toggle="modal" data-target="#confirmDeleteModal">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </span>     
                                    </div>      </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
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
                <form id="createUserForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-label" for="nameTextField"> Name
                                <input type="text" class="form-control" id="nameTextField"
                                    name="name" placeholder="User Name" required>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="passwordField"> Password
                                <input type="password" class="form-control" id="passwordField"
                                    name="password" placeholder="User Name" required>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="phoneTextField"> Phone
                                <input type="text" class="form-control" id="phoneTextField"
                                    name="phone_no" placeholder="User Phone Number" required>
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
    <div class="modal fade" id="updateUserModal" tabindex="-2" role="dialog"
        aria-labelledby="updateUserModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateUserModalTitle">Update User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="updateUserForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-label" for="updateNameTextField"> Name
                                <input type="text" class="form-control" id="updateNameTextField"
                                    name="name" placeholder="User Name" required>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="updatePhoneTextField"> Phone
                                <input type="text" class="form-control" id="updatePhoneTextField"
                                    name="phone_no" placeholder="User Phone Number" required>
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

    <!-- Confirm Delete Modal -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog"
        aria-labelledby="confirmDeleteModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Delete User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                        <h4 id="confirmDeleteQuestion">Are you sure you want to delete user</h4>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button id="deleteUserButton" class="btn btn-danger" type="submit">Delete</button>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <!-- Message Modal -->
    <div class="modal fade" id="messageModal" tabindex="-3" role="dialog"
        aria-labelledby="updateUserModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-success" id="messageModalTitle">
                        Success <i class="fas fa-check"></i> 
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>                
                <div class="modal-body">
                   <p id="responseMessage"></p> 
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
               
            </div>
        </div>
    </div>

    <!-- Transactions Modal -->
    <div class="modal fade" id="transactionsModal" tabindex="-3" role="dialog"
        aria-labelledby="transactionsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="transactionsModalTitle">
                        <i id="transactionTitleIcon" class="fas fa-user"></i>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>                
                <div class="modal-body">
                   <table class="table table-striped">
                        <thead>
                            <th>Vehicle Registration</th>
                            <th>Pass Name</th>
                            <th>Bank Transaction ID</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Creation Date</th>
                        </thead>
                        <tbody id="transactionData">
                        </tbody>
                   </table> 
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>               
            </div>
        </div>
    </div>
</html>
<script>
    var selectedUser
    $(document).ready(function () {
        $("#createUserForm").submit(function(event) {
            event.preventDefault();
            $.ajax({
                url: "/admin/create-user",
                method: "POST",
                dataType: 'json',
                data: $(this).serialize(),
                success: function(data) {
                    $('#createUserModal').modal('hide');
                    document.getElementById("responseMessage").textContent += data.message;               
                    $('#messageModal').modal('show');
                },
                error: function(error) {
                    alert("error");
                    console.log(error);
                }
            });
        });

        $("#updateUserForm").submit(function(event) {
            event.preventDefault();
            $.ajax({
                method: "PUT",
                url: "/admin/update-user/"+selectedUser.id,
                dataType: 'json',
                data: $(this).serialize(),
                success: function(data) {
                    $('#updateUserModal').modal('hide');
                    document.getElementById("responseMessage").textContent += data.message;               
                    $('#messageModal').modal('show');
                },
                error: function(error) {
                    alert("error");
                    console.log(error);
                }
            });
        });

        $('#deleteUserButton').click(function (event) {
            event.preventDefault();
            $.ajax({
                url: "/admin/delete-user/" + selectedUser.id,
                method: 'DELETE',
                dataType: 'json',
                success: function(data) {
                    $('#confirmDeleteModal').modal('hide');
                    document.getElementById("responseMessage").textContent += data.message;               
                    $('#messageModal').modal('show');
                },
                error: function(error) {
                    alert(error);
                }
            });
        });

        $("#messageModal").on('hide.bs.modal', function(){
            location.reload();
            document.getElementById("responseMessage").textContent = "";
        });
    });

    function updateValues(user) {
        selectedUser = user;
        document.getElementById("updateNameTextField").value    = user.name;
        document.getElementById("updatePhoneTextField").value   = user.phone_no;       
    }

    function confirmDelete(user) {
        selectedUser = user;
        document.getElementById("confirmDeleteQuestion").textContent += " " + user.name + " ?";
    }

    function getUserTransactions(user) {
        var htmlData = "";
        $("#transactionTitleIcon").append(" " + user.name);
        $.ajax({
                url: "/admin/transactions-by-user/" + user.id,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    $.each(data.transactions, function(index, itemData) {
                        htmlData = "<td>"+itemData.vehicle_reg_no+"</td>" 
                        htmlData += "<td>"+itemData.item_name+"</td>" 
                        htmlData += "<td>"+itemData.bank_transaction_id+"</td>" 
                        htmlData += "<td>"+itemData.amount+"</td>" 
                        htmlData += "<td>"+itemData.status+"</td>" 
                        htmlData += "<td>"+itemData.created_at+"</td>" 
                        $("#transactionData").html(htmlData);
                    });            
                    $('#transactionsModal').modal('show');
                },
                error: function(error) {
                    alert(error);
                }
            });
    }
</script>