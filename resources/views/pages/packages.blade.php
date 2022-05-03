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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createPackageModal">
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
                                            <button type="submit" class="btn btn-primary" onclick="updateValues({{$package}});" 
                                                data-toggle="modal" data-target="#updatePackageModal">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </span>
                                        <span class="ml-1">
                                            <form action="/admin/delete-package/{{$package->id}}" method="POST">
                                                <input type="hidden" name="_method" value="delete">
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
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
    <div class="modal fade" id="createPackageModal" tabindex="-1" role="dialog" aria-labelledby="createPackageModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createPackageModalTitle">Create Package</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/admin/create-package" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-label" for="nameTextField"> Name
                                <input type="text" class="form-control" id="nameTextField" name="name" placeholder="Package Name" required>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="validityTextField"> Validity
                                <input type="text" class="form-control" id="validityTextField" name="validity" placeholder="Package Validity (in days)" required>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="priceTextField"> Price
                                <input type="text" class="form-control" id="priceTextField" name="price" placeholder="Package Price" required>
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
    <div class="modal fade" id="updatePackageModal" tabindex="-2" role="dialog" aria-labelledby="updatePackageModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updatePackageModalTitle">Update Package</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="updatePackageForm" method="post">
                    <input type="hidden" name="_method" value="put">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-label" for="updateNameTextField"> Name
                                <input type="text" class="form-control" id="updateNameTextField" name="name" placeholder="Package Name" required>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="updateValidityTextField"> Validity
                                <input type="text" class="form-control" id="updateValidityTextField" name="validity" placeholder="Package Validity (in days)" required>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="updatePriceTextField"> Price
                                <input type="text" class="form-control" id="updatePriceTextField" name="price" placeholder="Package Price" required>
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
    function updateValues(package) {
        document.getElementById("updatePackageForm").action = "/admin/update-package/"+package.id
        document.getElementById("updateNameTextField").value = package.name;
        document.getElementById("updateValidityTextField").value = package.validity;
        document.getElementById("updatePriceTextField").value = package.price;
    }
</script>