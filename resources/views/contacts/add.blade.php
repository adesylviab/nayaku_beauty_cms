<x-dashboard-layout>
    <section class="content-header">
      <h1>
        Dashboard
        <small>Add Contacts</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('contacts') }}"><i class="fa fa-dashboard"></i> Contacts</a></li>
        <li class="active">Add Contacts</li>
      </ol>
    </section>
    <section class="content">
     <div class="row">
      <div class="col-md-12">
          <div class="box box-primary">
              <div class="box-header">
                <h3 class="box-title">Tambah Contacts</h3>
              </div><!-- /.box-header -->
              <!-- form start -->
              <form role="form" method="POST" action="{{ route('insert-contacts') }}">
                <div class="box-body">
                  @csrf
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input name="name" type="text" class="form-control" id="judul" placeholder="Masukkan Nama">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Contact</label>
                    <input name="contact" type="text" class="form-control" id="judul" placeholder="Masukkan Contact">
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