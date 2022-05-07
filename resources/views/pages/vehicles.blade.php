<!doctype html>
<html>
<head>
   @include('includes.head')
   <title>Pay Parking: Vehicles</title>
</head>
    <body>
        <div class="wrapper">
            @include('includes.header')
            <div id="content" class="container-fluid">
                <div class="my-1">
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#createVehicleModal">
                        Create Vehicle
                    </button>
                </div>

                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Model</th>
                            <th scope="col">Registration No.</th>
                            <th scope="col">Created On</th>
                            <th scope="col">Updated On</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($vehicles as $vehicle)
                            <tr onclick="getVehicleTransactions({{$vehicle}});">
                                <td>{{$vehicle->id}}</td>
                                <td>{{$vehicle->model}}</td>
                                <td>{{$vehicle->reg_no}}</td>
                                <td>{{$vehicle->created_at}}</td>
                                <td>{{$vehicle->updated_at}}</td>                       
                                <td>
                                    <div class="row">
                                        <span class="mr-1">
                                            <button type="submit" class="btn btn-primary"
                                                onclick="updateValues({{$vehicle}});" 
                                                data-toggle="modal" data-target="#updateVehicleModal">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </span>
                                        <span class="ml-1">
                                            <button type="submit" class="btn btn-danger"
                                                onclick="confirmDelete({{$vehicle}});"
                                                data-toggle="modal" data-target="#confirmDeleteModal">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </span>     
                                    </div>                                                     
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </body>
    
<!-- Create Vehicle Modal -->
    <div class="modal fade" id="createVehicleModal" tabindex="-1" role="dialog"
        aria-labelledby="createVehicleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createVehicleModalTitle">Create Vehicle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="createVehicleForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-label" for="modelTextField"> Model
                                <input type="text" class="form-control" id="modelTextField"
                                    name="model" placeholder="Vehicle Model" required>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="registrationNoTextField"> Registration Number
                                <input type="text" class="form-control" id="registrationNoTextField"
                                    name="registrationNo" placeholder="Vehicle Registration Number" required>
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

    <!-- Update Vehicle Modal -->
    <div class="modal fade" id="updateVehicleModal" tabindex="-2" role="dialog"
        aria-labelledby="updateVehicleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateVehicleModalTitle">Update Vehicle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="updateVehicleForm" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-label" for="updateModelTextField"> Model
                                <input type="text" class="form-control" id="updateModelTextField"
                                    name="model" placeholder="Vehicle Model" required>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="updateRegistrationNoTextField"> Registration Number
                                <input type="text" class="form-control" id="updateRegistrationNoTextField"
                                    name="registrationNo" placeholder="Vehicle Registration Number" required>
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
                    <h5 class="modal-title">Confirm Delete Vehicle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                        <h4 id="confirmDeleteQuestion">Are you sure you want to delete vehicle</h4>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button id="deleteVehicleButton" class="btn btn-danger" type="submit">Delete</button>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <!-- Message Modal -->
    <div class="modal fade" id="messageModal" tabindex="-3" role="dialog"
        aria-labelledby="updateVehicleModalLabel" aria-hidden="true">
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
                        <i id="transactionTitleIcon" class="fas fa-car"></i>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>                
                <div class="modal-body">
                   <table class="table table-striped">
                        <thead>
                            <th>User Name</th>
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
    var selectedVehicle
    $(document).ready(function () {
        $("#createVehicleForm").submit(function(event) {
            event.preventDefault();
            $.ajax({
                url: "/admin/create-vehicle",
                method: "POST",
                dataType: 'json',
                data: $(this).serialize(),
                success: function(data) {
                    $('#createVehicleModal').modal('hide');
                    document.getElementById("responseMessage").textContent += data.message;               
                    $('#messageModal').modal('show');
                },
                error: function(error) {
                    alert("error");
                    console.log(error);
                }
            });
        });

        $("#updateVehicleForm").submit(function(event) {
            event.preventDefault();
            $.ajax({
                url: "/admin/update-vehicle/"+selectedVehicle.id,
                method: "PUT",
                dataType: 'json',
                data: $(this).serialize(),
                success: function(data) {
                    $('#updateVehicleModal').modal('hide');
                    document.getElementById("responseMessage").textContent += data.message;               
                    $('#messageModal').modal('show');
                },
                error: function(error) {
                    alert("error");
                    console.log(error);
                }
            });
        });

        $('#deleteVehicleButton').click(function (event) {
            event.preventDefault();
            $.ajax({
                url: "/admin/delete-vehicle/" + selectedVehicle.id,
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

    function updateValues(vehicle) {
        selectedVehicle = vehicle;
        document.getElementById("updateModelTextField").value           = vehicle.model;
        document.getElementById("updateRegistrationNoTextField").value  = vehicle.reg_no;
    }

    function confirmDelete(vehicle) {
        selectedVehicle = vehicle;
        document.getElementById("confirmDeleteQuestion").textContent += " " + vehicle.reg_no + " ?";
    }

    function getVehicleTransactions(vehicle) {
        var htmlData = "";
        $("#transactionTitleIcon").append(" " + vehicle.reg_no);
        $.ajax({
                url: "/admin/transactions-by-vehicle/" + vehicle.id,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    $.each(data.transactions, function(index, itemData) {
                        htmlData = "<td>"+itemData.username+"</td>" 
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