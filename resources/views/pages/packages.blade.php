<!doctype html>
<html>
<head>
   @include('includes.head')
   <title>Pay Parking: Packages</title>
</head>
    <body>
        <div class="wrapper">
            @include('includes.header')
            <div id="content" class="container-fluid">
                <div class="my-1">
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#createPackageModal">
                        Create Package
                    </button>
                </div>

                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Validity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Created On</th>
                            <th scope="col">Updated On</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($packages as $package)
                            <tr>
                                <td>{{$package->id}}</td>
                                <td>{{$package->name}}</td>
                                <td>{{$package->validity}}</td>
                                <td>{{$package->price}}</td>
                                <td>{{$package->created_at}}</td>
                                <td>{{$package->updated_at}}</td>                       
                                <td>
                                    <div class="row">
                                        <span class="mr-1">
                                            <button type="submit" class="btn btn-primary"
                                                onclick="updateValues({{$package}});" 
                                                data-toggle="modal" data-target="#updatePackageModal">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </span>
                                        <span class="ml-1">
                                            <button type="submit" class="btn btn-danger"
                                                onclick="confirmDelete({{$package}});"
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
    
<!-- Create Package Modal -->
    <div class="modal fade" id="createPackageModal" tabindex="-1" role="dialog"
        aria-labelledby="createPackageModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createPackageModalTitle">Create Package</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="createPackageForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-label" for="nameTextField"> Name
                                <input type="text" class="form-control" id="nameTextField"
                                    name="name" placeholder="Package Name" required>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="validityTextField"> Validity
                                <input type="text" class="form-control" id="validityTextField"
                                    name="validity" placeholder="Package Validity (in days)" required>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="priceTextField"> Price
                                <input type="text" class="form-control" id="priceTextField"
                                    name="price" placeholder="Package Price" required>
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

    <!-- Update Package Modal -->
    <div class="modal fade" id="updatePackageModal" tabindex="-2" role="dialog"
        aria-labelledby="updatePackageModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updatePackageModalTitle">Update Package</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="updatePackageForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-label" for="updateNameTextField"> Name
                                <input type="text" class="form-control" id="updateNameTextField"
                                    name="name" placeholder="Package Name" required>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="updateValidityTextField"> Validity
                                <input type="text" class="form-control" id="updateValidityTextField"
                                    name="validity" placeholder="Package Validity (in days)" required>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="updatePriceTextField"> Price
                                <input type="text" class="form-control" id="updatePriceTextField"
                                    name="price" placeholder="Package Price" required>
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
                    <h5 class="modal-title">Confirm Delete Package</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                        <h4 id="confirmDeleteQuestion">Are you sure you want to delete package</h4>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button id="deletePackageButton" class="btn btn-danger" type="submit">Delete</button>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <!-- Message Modal -->
    <div class="modal fade" id="messageModal" tabindex="-3" role="dialog"
        aria-labelledby="updatePackageModalLabel" aria-hidden="true">
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

</html>
<script>
    var selectedPackage

    $(document).ready(function () {
        $("#createPackageForm").submit(function(event) {
            event.preventDefault();
            $.ajax({
                url: "/admin/create-package",
                method: "POST",
                dataType: 'json',
                data: $(this).serialize(),
                success: function(data) {
                    $('#createPackageModal').modal('hide');
                    document.getElementById("responseMessage").textContent += data.message;               
                    $('#messageModal').modal('show');
                },
                error: function(error) {
                    alert("error");
                    console.log(error);
                }
            });
        });

        $("#updatePackageForm").submit(function(event) {
            event.preventDefault();
            $.ajax({
                url: "/admin/update-package/"+selectedPackage.id,
                method: "PUT",
                dataType: 'json',
                data: $(this).serialize(),
                success: function(data) {
                    $('#updatePackageModal').modal('hide');
                    document.getElementById("responseMessage").textContent += data.message;               
                    $('#messageModal').modal('show');
                },
                error: function(error) {
                    alert("error");
                    console.log(error);
                }
            });
        });

        $('#deletePackageButton').click(function (event) {
            event.preventDefault();
            $.ajax({
                url: "/admin/delete-package/" + selectedPackage.id,
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

    function updateValues(package) {
        selectedPackage = package;
        document.getElementById("updateNameTextField").value        = package.name;
        document.getElementById("updateValidityTextField").value    = package.validity;
        document.getElementById("updatePriceTextField").value       = package.price;
    }

    function confirmDelete(package) {
        selectedPackage = package;
        document.getElementById("confirmDeleteQuestion").textContent += " " + package.name + " ?";
    }
</script>