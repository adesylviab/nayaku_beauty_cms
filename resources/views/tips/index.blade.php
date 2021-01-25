<x-dashboard-layout>
    <section class="content-header">
        <h1>
          Dashboard
          <small>Tips</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Tips</li>
        </ol>
      </section>
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <a href="{{ route('add-tips') }}" class="btn btn-success"><h3 class="box-title">Tambah Tips</h3></a>
                </div><!-- /.box-header -->
              <div class="box-body">
                <table class="table table-bordered">
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th style="width: 40px">Action</th>
                  </tr>
                  @foreach ($tips as $tip)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$tip->judul}}</td>
                    <td>{{date_format(date_create($tip->created_at),"l, d m Y")}}</td>
                    <td style="display: flex"><a href="{{ route('lihat-tips', $tip->id) }}"><span class="badge bg-blue"><i class="fa fa-eye"></i></span></a> </td>
                  </tr>
                  @endforeach
                </table>
              </div><!-- /.box-body -->
              <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                  <li><a href="#">&laquo;</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ul>
              </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </section><!-- /.content -->
      <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are You Sure to Delete This Data?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger btn-ok">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-dashboard-layout>
<script>
  $('#confirm-delete').on('click', '.btn-ok', function(e) {
      var $modalDiv = $(e.delegateTarget);
      var id = $(this).data('recordId');
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.post('/deleteTreatment/' + id).then()
      $modalDiv.addClass('loading');
      setTimeout(function() {
          $modalDiv.modal('hide').removeClass('loading');
          setTimeout(function(){// wait for 5 secs(2)
              location.reload(); // then reload the page.(3)
          }, 1000); 
          
      })
  });
  $('#confirm-delete').on('show.bs.modal', function(e) {
      var data = $(e.relatedTarget).data();
      $('.title', this).text(data.recordTitle);
      $('.btn-ok', this).data('recordId', data.recordId);
  });
</script>