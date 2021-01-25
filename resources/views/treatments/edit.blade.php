<x-dashboard-layout>
    <section class="content-header">
      <h1>
        Dashboard
        <small>Edit Treatments</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('treatments') }}"><i class="fa fa-dashboard"></i> Treatments</a></li>
        <li class="active">Edit Treatments</li>
      </ol>
    </section>
    <section class="content">
     <div class="row">
      <div class="col-md-12">
          <div class="box box-primary">
              <div class="box-header">
                <h3 class="box-title">Edit Treatment</h3>
              </div><!-- /.box-header -->
              <!-- form start -->
              <form role="form" method="POST" action="{{ route('save-treatments',$treatment->id) }}">
                <div class="box-body">
                  @csrf
                  <div class="form-group">
                    <label for="exampleInputEmail1">Perawatan</label>
                    <input name="perawatan" type="text" class="form-control" id="perawatan" value="{{$treatment->nama}}" placeholder="Masukkan Perawatan">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Kode Perawatan</label>
                    <input name="kd_perawatan" type="text" value="{{$treatment->kd_treatment}}" class="form-control" id="ekd_perawatan" placeholder="Kode Perawatan">
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