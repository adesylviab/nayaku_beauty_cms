<x-dashboard-layout>
    <section class="content-header">
      <h1>
        Dashboard
        <small>Add Tips</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('tips') }}"><i class="fa fa-dashboard"></i> Tips</a></li>
        <li class="active">Add Tips</li>
      </ol>
    </section>
    <section class="content">
     <div class="row">
      <div class="col-md-12">
          <div class="box box-primary">
              <div class="box-header">
                <h3 class="box-title">Tambah Tips</h3>
              </div><!-- /.box-header -->
              <!-- form start -->
              <form role="form" method="POST" action="{{ route('insert-tips') }}">
                <div class="box-body">
                  @csrf
                  <div class="form-group">
                    <label for="exampleInputEmail1">Judul</label>
                    <input name="judul" type="text" class="form-control" id="judul" placeholder="Masukkan Judul">
                  </div>
                  <div class="form-group">
                    <textarea name="tips" id="tips" cols="30" rows="10"></textarea>
                  </div>
                </div><!-- /.box-body -->
      
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div><!-- /.box -->
         </div>
     </div>
    </section>
  </x-dashboard-layout>
  <script>
    CKEDITOR.replace( 'tips' );
  </script>