<!doctype html>
<html>
<head>
   @include('includes.head')
   <title>Pay Parking: Agents</title>
</head>
    <body>
        <div class="wrapper">
            @include('includes.header')
            <div id="content" class="container-fluid">
                <div class="my-1">
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#createAgentModal">
                        Create Agent
                    </button>
                </div>

                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Username</th>
                            <th scope="col">Phone No</th>
                            <th scope="col">Creation Date</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($agents as $agent)
                            <tr>
                                <td>{{$agent->id}}</td>
                                <td>{{$agent->name}}</td>
                                <td>{{$agent->username}}</td>
                                <td>{{$agent->phone_no}}</td>
                                <td>{{$agent->created_at}}</td>
                                <td><div class="row">
                                        <span class="mr-1">
                                            <button type="submit" class="btn btn-primary"
                                                onclick="updateValues({{$agent}});" 
                                                data-toggle="modal" data-target="#updateAgentModal">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </span>
                                        <span class="ml-1">
                                            <button type="submit" class="btn btn-danger"
                                                onclick="confirmDelete({{$agent}});"
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

    <!-- Create Agent Modal -->
    <div class="modal fade" id="createAgentModal" tabindex="-1" role="dialog"
        aria-labelledby="createAgentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createAgentModalTitle">Create Agent</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="createAgentForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-label" for="nameTextField"> Name
                                <input type="text" class="form-control" id="nameTextField"
                                name="name" placeholder="Agent Name" required>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="usernameTextField"> Username
                                <input type="text" class="form-control" id="usernameTextField"
                                name="username" placeholder="Agent Username" required>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="passwordField"> Password
                                <input type="password" class="form-control" id="passwordField"
                                    name="password" placeholder="Agent Name" required>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="phoneTextField"> Phone
                                <input type="text" class="form-control" id="phoneTextField"
                                    name="phone_no" placeholder="Agent Phone Number" required>
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

    <!-- Update Agent Modal -->
    <div class="modal fade" id="updateAgentModal" tabindex="-2" role="dialog" aria-labelledby="updateAgentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateAgentModalTitle">Update Agent</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="updateAgentForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-label" for="updateNameTextField"> Name
                                <input type="text" class="form-control" id="updateNameTextField"
                                    name="name" placeholder="Agent Name" required>
                            </label>
                        </div>                        
                        <div class="form-group">
                            <label class="form-label" for="updateUsernameTextField"> Username
                                <input type="text" class="form-control" id="updateUsernameTextField"
                                    name="username" placeholder="Agent Username" required>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="updatePhoneTextField"> Phone
                                <input type="text" class="form-control" id="updatePhoneTextField"
                                    name="phone_no" placeholder="Agent Phone Number" required>
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

    <!-- Confirm Delete Modal -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog"
        aria-labelledby="confirmDeleteModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Delete Agent</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                        <h4 id="confirmDeleteQuestion">Are you sure you want to delete agent</h4>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button id="deleteAgentButton" class="btn btn-danger" type="submit">Delete</button>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <!-- Message Modal -->
    <div class="modal fade" id="messageModal" tabindex="-3" role="dialog"
        aria-labelledby="updateAgentModalLabel" aria-hidden="true">
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

<script>
    var selectedAgent
    $(document).ready(function () {
        $("#createAgentForm").submit(function(event) {
            event.preventDefault();
            $.ajax({
                url: "/admin/create-agent",
                method: "POST",
                dataType: 'json',
                data: $(this).serialize(),
                success: function(data) {
                    $('#createAgentModal').modal('hide');
                    document.getElementById("responseMessage").textContent += data.message;               
                    $('#messageModal').modal('show');
                },
                error: function(error) {
                    alert("error");
                    console.log(error);
                }
            });
        });

        $("#updateAgentForm").submit(function(event) {
            event.preventDefault();
            $.ajax({
                url: "/admin/update-agent/"+selectedAgent.id,
                method: "PUT",
                dataType: 'json',
                data: $(this).serialize(),
                success: function(data) {
                    $('#updateAgentModal').modal('hide');
                    document.getElementById("responseMessage").textContent += data.message;               
                    $('#messageModal').modal('show');
                },
                error: function(error) {
                    alert("error");
                    console.log(error);
                }
            });
        });

        $('#deleteAgentButton').click(function (event) {
            event.preventDefault();
            $.ajax({
                url: "/admin/delete-agent/" + selectedAgent.id,
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

    function updateValues(agent) {
        selectedAgent = agent;
        document.getElementById("updateNameTextField").value        = agent.name;
        document.getElementById("updatePhoneTextField").value       = agent.phone_no;
        document.getElementById("updateUsernameTextField").value    = agent.username;        
    }

    function confirmDelete(agent) {
        selectedAgent = agent;
        document.getElementById("confirmDeleteQuestion").textContent += " " + agent.name + " ?";
    }
</script>