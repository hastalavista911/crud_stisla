<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Master User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></div>
                <div class="breadcrumb-item">User Management</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="buttons" style="margin-left: 20px; margin-top: 20px;">
                        <button id="btn_add_data" data-toggle="modal" data-target="#exampleModal"
                            class="btn btn-success">New</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tableUser">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Phone/Wa</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-body">
        </div>
    </section>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formUser" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="username">Username</label>
                            <input type="hidden" class="form-control" name="user_id" id="user_id">
                            <input type="text" name="username" class="form-control" id="username" placeholder="Username"
                                required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email"
                                required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="phone">Phone/Wa</label>
                            <input type="text" name="phone" class="form-control" id="phone" placeholder="phone"
                                required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password-user" autocomplete
                                placeholder="Password">
                            <a toggle="#password-user" class="fa fa-fw fa-eye field-icon toggle-password-user"></a>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="role">Role</label>
                            <select name="role" class="form-control select2" id="role" required>
                                <option value="">Choose Role</option>
                                <option value="1">Superadmin</option>
                                <option value="2">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="status">Status</label>
                            <select name="status" class="form-control select2" id="status" required>
                                <option value="">Choose Status</option>
                                <option value="1">ACTIVE</option>
                                <option value="0">INACTIVE</option>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
<script>
$(document).ready(function() {
    var tableUser = $("#tableUser").dataTable({
        processing: true,
        select: false,
        ajax: {
            url: "<?php echo base_url('user/get_data_user') ?>",
            dataType: "JSON",
            type: "GET",
            dataSrc: function(data) {
                var returnDatauser = new Array();
                if (data.status == "success") {
                    $.each(data["data"], function(i, item) {

                        var cekRole = item["role"];
                        if (item['role'] == 1) {
                            cekRole = "Superadmin";
                        } else {
                            cekRole = "Admin";
                        }
                        var cekStatus = item["status"];
                        if (cekStatus == 1) {
                            cekStatus = "<div class='badge badge-success'>ACTIVE</div>";
                        } else {
                            cekStatus = "<div class='badge badge-warning'>INACTIVE</div>";
                        }

                        returnDatauser.push({
                            "no": (i + 1),
                            "username": item["username"],
                            "email": item["email"],
                            "phone": item["phone"],
                            "role": cekRole,
                            "status": cekStatus,
                            "action": "<center><button id='btn_edit' data-user_id='" +
                                item["user_id"] +
                                "' class='btn btn-sm btn-warning'><i class='fa fa-edit'></i></button>&nbsp;" +
                                "<button id='btn_delete' data-user_id='" + item[
                                    "user_id"] +
                                "' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i></button></center>"
                        });
                    });
                }
                return returnDatauser;
            }
        },
        columns: [{
                data: "no"
            },
            {
                data: "username"
            },
            {
                data: "email"
            },
            {
                data: "phone"
            },
            {
                data: "role"
            },
            {
                data: "status"
            },
            {
                data: "action"
            }
        ]
    });
});

$(document).on("click", "#btn_add_data", function(e) {
    $('#formUser')[0].reset();
    $('#user_id').val("");
    $("#exampleModal").modal("show");
});

$(document).on("click", "#btn_edit", function(e) {
    e.preventDefault();
    $("#formUser")[0].reset();
    var user_id = $(this).data("user_id");
    $.ajax({
        "async": true,
        "crossDomain": true,
        "url": "<?= base_url('user/get_data_user/') ?>" + user_id,
        "method": "GET",
    }).done(function(response) {
        var data = JSON.parse(response);
        $("#user_id").val(data.data[0].user_id);
        $("#username").val(data.data[0].username);
        $("#email").val(data.data[0].email);
        $("#phone").val(data.data[0].phone);
        $("#role").val(data.data[0].role).change();
        $("#status").val(data.data[0].status).change();
        $("#exampleModal").modal("show");
    });
});

$(document).on("submit", "#formUser", function(e) {
    e.preventDefault();
    var user_id = $("#user_id").val();
    console.log(user_id);
    var url = (user_id == "" ? "addUser" : "editUser");
    $.ajax({
        "async": true,
        "crossDomain": true,
        "url": "<?= base_url('user/') ?>" + url,
        "method": "POST",
        "data": $(this).serialize(),
    }).done(function(response) {
        var data = JSON.parse(response);
        var message = data.message;
        if (data.status == "success") {
            $("#exampleModal").modal("hide");
            swal({
                title: "Success",
                text: message,
                type: "success",
                confirmButtonColor: "#a5dc86",
                confirmButtonText: "Close",
            }, function(isConfirm) {
                $("#tableUser").DataTable().ajax.reload();
            });
        } else {
            swal("Failed", message, "warning");
        }
    });
});

$(document).on("click", ".toggle-password-user", function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});

$(document).on("click", "#btn_delete", function(e) {
    var user_id = $(this).data("user_id");
    swal({
        title: "Apakah anda yakin ingin menghapus ?",
        text: "Anda tidak akan dapat mengembalikan ini!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Tidak, Batalkan!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm) {
        if (isConfirm) {
            var settings = {
                "async": true,
                "crossDomain": true,
                "url": "<?= base_url('user/soft_delete_user') ?>",
                "method": "POST",
                "data": {
                    "user_id": user_id
                }
            }

            $.ajax(settings).done(function(response) {
                var data = JSON.parse(response);
                var message = data.message;
                if (data.status == "success") {
                    swal({
                        title: "Sukses",
                        text: message,
                        type: "success",
                        confirmButtonColor: "#a5dc86",
                        confirmButtonText: "Close",
                    }, function(isConfirm) {
                        $("#tableUser").DataTable().ajax.reload();
                    });
                } else {
                    swal("Gagal menghapus data.", message.toUpperCase(), "warning");
                }
            });
        }
    });
});
</script>