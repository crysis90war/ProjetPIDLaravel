
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LEMKA - Admin | Gestion des articles</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css"/>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container"><br />
            <h3 align="center">Gestion des articles</h3><br/>
            <div align="left" class="col">
                <a href="/Admin" class="btn btn-danger btn-sm">Retourn</a>
            </div>

            <div align="right" class="col">
                <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Créer un enregistrement</button>
            </div><br/>

            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="article_table">
                    <thead>
                        <tr>
                            <th width="10%">Image</th>
                            <th width="10%">Catégorie</th>
                            <th width="30%">Titre</th>
                            <th width="30%">Description</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                </table>
            </div><br/><br/>
        </div>
    </body>
</html>

<div id="formModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ajouter un nouvel enregistrement</h4>
            </div>

            <div class="modal-body">
                <span id="form_result"></span>
                <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label class="control-label col-md-4" >Catégorie : </label>
                        <div class="col-md-8">
                            <select class="form-control form-control-sm" name="ref_typearticle" id="ref_typearticle">
                                <option value="">Selectionnez la catégorie</option>
                                @foreach ($typearticles as $typearticle)
                                <option value="{{$typearticle->id}}">{{$typearticle->nom}}</option>
                                @endforeach

                              </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4" >Titre : </label>
                        <div class="col-md-8">
                            <input type="text" name="titre" id="titre" class="form-control" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4">Description : </label>
                        <div class="col-md-8">
                            <input type="text" name="description" id="description" class="form-control" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4">Selectionez une image : </label>
                        <div class="col-md-8">
                            <input type="file" name="image" id="image" />
                            <span id="store_image"></span>
                        </div>
                    </div><br/>

                    <div class="form-group" align="center">
                        <input type="hidden" name="action" id="action" />
                        <input type="hidden" name="hidden_id" id="hidden_id" />
                        <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Ajouter" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Confirmation</h2>
            </div>

            <div class="modal-body">
                <h4 align="center" style="margin:0;">Voulez-vous vraiment supprimer ces données?</h4>
            </div>

            <div class="modal-footer">
                <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){

    $('#article_table').DataTable({
     processing: true,
     serverSide: true,
     ajax:{
      url: "{{ route('ajax-crud.index') }}",
     },
     columns:[
      {
       data: 'image',
       name: 'image',
       render: function(data, type, full, meta){
        return "<img src={{ URL::to('/') }}/images/" + data + " width='70' class='img-thumbnail' />";
       },
       orderable: false
      },
      {
          data: 'nom',
          name: 'nom'
      },
      {
       data: 'titre',
       name: 'titre'
      },
      {
       data: 'description',
       name: 'description'
      },
      {
       data: 'action',
       name: 'action',
       orderable: false
      }
     ]
    });

    $('#create_record').click(function(){
     $('.modal-title').text("Ajouter un nouvel enregistrement");
        $('#action_button').val("Ajouter");
        $('#action').val("Ajouter");
        $('#formModal').modal('show');
    });

    $('#sample_form').on('submit', function(event){
     event.preventDefault();
     if($('#action').val() == 'Ajouter')
     {
      $.ajax({
       url:"{{ route('ajax-crud.store') }}",
       method:"POST",
       data: new FormData(this),
       contentType: false,
       cache:false,
       processData: false,
       dataType:"json",
       success:function(data)
       {
        var html = '';
        if(data.errors)
        {
         html = '<div class="alert alert-danger">';
         for(var count = 0; count < data.errors.length; count++)
         {
          html += '<p>' + data.errors[count] + '</p>';
         }
         html += '</div>';
        }
        if(data.success)
        {
         html = '<div class="alert alert-success">' + data.success + '</div>';
         $('#sample_form')[0].reset();
         $('#article_table').DataTable().ajax.reload();
        }
        $('#form_result').html(html);
       }
      })
     }

     if($('#action').val() == "Edit")
     {
      $.ajax({
       url:"{{ route('ajax-crud.update') }}",
       method:"POST",
       data:new FormData(this),
       contentType: false,
       cache: false,
       processData: false,
       dataType:"json",
       success:function(data)
       {
        var html = '';
        if(data.errors)
        {
         html = '<div class="alert alert-danger">';
         for(var count = 0; count < data.errors.length; count++)
         {
          html += '<p>' + data.errors[count] + '</p>';
         }
         html += '</div>';
        }
        if(data.success)
        {
         html = '<div class="alert alert-success">' + data.success + '</div>';
         $('#sample_form')[0].reset();
         $('#store_image').html('');
         $('#article_table').DataTable().ajax.reload();
        }
        $('#form_result').html(html);
       }
      });
     }
    });

    $(document).on('click', '.edit', function(){
     var id = $(this).attr('id');
     $('#form_result').html('');
    console.log()
     $.ajax({
      url:"/ajax-crud/"+id+"/edit",
      dataType:"json",
      success:function(html){
       $('#titre').val(html.data.titre);
       $('#nom').val(html.data.nom);
       $('ref_typearticle').val(html.data.ref_typearticle);
       $('#description').val(html.data.description);
       $('#store_image').html("<img src={{ URL::to('/') }}/images/" + html.data.image + " width='70' class='img-thumbnail' />");
       $('#store_image').append("<input type='hidden' name='hidden_image' value='"+html.data.image+"' />");
       $('#hidden_id').val(html.data.id);
       $('.modal-title').text("Edit New Record");
       $('#action_button').val("Edit");
       $('#action').val("Edit");
       $('#formModal').modal('show');
      }
     })
    });

    var user_id;

    $(document).on('click', '.delete', function(){
     user_id = $(this).attr('id');
     $('#confirmModal').modal('show');
    });

    $('#ok_button').click(function(){
        $.ajax({
            url:"ajax-crud/destroy/"+user_id,
            beforeSend:function(){
                $('#ok_button').text('Suppression...');
                console.log(user_id);
            },

            success:function(data)
            {
                setTimeout(function(){
                    $('#confirmModal').modal('hide');
                    $('#article_table').DataTable().ajax.reload();
                }, 2000);
            }
        })
    });
});

</script>

