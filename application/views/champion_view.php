<html>
<head>
    <title>Data Champion Wildrift</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <h3 class="navbar-text">Data Champion</h3>
            </div>
        </div>
    </nav>
    <div class="container">
        <br />
        <br />
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="panel-title">Daftar Champion Wildrift</h3>
                    </div>
                    <div class="col-md-6" align="right">
                        <button type="button" id="add_button" class="btn btn-success btn-xs">Tambah Data Champion</button>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <span id="success_message"></span>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>              
                            <th>Nama</th>
                            <th>Role</th>
                            <th>Lane</th>
                            <th>Region</th>
                            <th>Gender</th>
                            <th>Difficulty</th>
                            <th>Edit</th>
                            <th>Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

<div id="userModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="user_form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah Champion</h4>
                </div>
                <div class="modal-body">
                    <label>Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" />
                    <span id="nama_error" class="text-danger"></span>
                    <br />

                    <label>Role</label>
                    <input type="text" name="role" id="role" class="form-control" />
                    <span id="role_error" class="text-danger"></span>
                    <br />

                    <label>Lane</label>
                    <input type="text" name="lane" id="lane" class="form-control" />
                    <span id="lane_error" class="text-danger"></span>
                    <br />

                    <label>Regin</label>
                    <input type="text" name="region" id="region" class="form-control" />
                    <span id="region_error" class="text-danger"></span>
                    <br />

                    <label>Gender</label>
                    <input type="text" name="gender" id="gender" class="form-control" />
                    <span id="gender_error" class="text-danger"></span>
                    <br />

                    <label>Difficulty</label>
                    <input type="text" name="difficulty" id="difficulty" class="form-control" />
                    <span id="difficulty_error" class="text-danger"></span>
                    <br />
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_champion" id="id_champion" />
                    <input type="hidden" name="data_action" id="data_action" value="Insert" />
                    <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
    
    function fetch_data()
    {
        $.ajax({
            url:"<?php echo base_url(); ?>champion/action",
            method:"POST",
            data:{data_action:'fetch_all'},
            success:function(data)
            {
                $('tbody').html(data);
            }
        });
    }

    fetch_data();

    $('#add_button').click(function(){
        $('#user_form')[0].reset();
        $('.modal-title').text("tambah champion");
        $('#action').val('Add');
        $('#data_action').val("Insert");
        $('#userModal').modal('show');
    });

    $(document).on('submit', '#user_form', function(event){
        event.preventDefault();
        $.ajax({
            url:"<?php echo base_url() . 'Champion/action' ?>",
            method:"POST",
            data:$(this).serialize(),
            dataType:"json",
            success:function(data)
            {
                if(data.success)
                {
                    $('#user_form')[0].reset();
                    $('#userModal').modal('hide');
                    fetch_data();
                    if($('#data_action').val() == "Insert")
                    {
                        $('#success_message').html('<div class="alert alert-success">Data Sudah Ditambah</div>');
                    }
                }

                if(data.error)
                {
                    $('#nama_error').html(data.nama_error);
                    $('#role_error').html(data.role_error);
                    $('#lane_error').html(data.lane_error);
                    $('#region_error').html(data.region_error);
                    $('#gender_error').html(data.gender_error);
                    $('#difficulty_error').html(data.difficulty_error);
                }
            }
        })
    });

    $(document).on('click', '.edit', function(){
        var id_champion = $(this).attr('id');
        $.ajax({
            url:"<?php echo base_url(); ?>Champion/action",
            method:"POST",
            data:{id_champion:id_champion, data_action:'fetch_single'},
            dataType:"json",
            success:function(data)
            {
                $('#userModal').modal('show');
                $('#nama').val(data.nama);
                $('#role').val(data.role);
                $('#lane').val(data.lane);
                $('#region').val(data.region);
                $('#gender').val(data.gender);
                $('#difficulty').val(data.difficulty);
                $('.modal-title').text('Edit Champion');
                $('#id_champion').val(id_champion);
                $('#action').val('Edit');
                $('#data_action').val('Edit');
            }
        })
    });

    $(document).on('click', '.delete', function(){
        var id_champion = $(this).attr('id');
        if(confirm("Apa anda yakin ingin menghapus?"))
        {
            $.ajax({
                url:"<?php echo base_url(); ?>Champion/action",
                method:"POST",
                data:{id_champion:id_champion, data_action:'Delete'},
                dataType:"JSON",
                success:function(data)
                {
                    if(data.success)
                    {
                        $('#success_message').html('<div class="alert alert-danger">Data Sudah Dihapus</div>');
                        fetch_data();
                    }
                }
            })
        }
    });
    
});
</script>