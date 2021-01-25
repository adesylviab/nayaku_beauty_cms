<x-dashboard-layout>
    <section class="content-header">
      <h1>
        Dashboard
        <small>Edit Complaints</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('complaints') }}"><i class="fa fa-dashboard"></i> Complaints</a></li>
        <li class="active">Edit Complaints</li>
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
              <form role="form" method="POST" action="{{ route('save-complaints',$complaint->id) }}">
                <div class="box-body">
                  @csrf
                  <label for="keluhan">Kode Perawatan</label>
                  <div class="input-group input-group-sm">
                    <input type="text" class="form-control" value="{{$complaint->keluhan}}" name="keluhan" placeholder="Masukkan Keluhan">
                    <span class="input-group-btn">
                      <button class="btn btn-info btn-flat" type="button" id="add_input">+</button>
                    </span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kulit</label>
                    <select name="kulit" id="kulit" class="form-control">
                      <option value="">Pilih Kulit</option>
                      <option value="Kulit Normal">Kulit Normal</option>
                      <option value="Kulit Sensitif">Kulit Sensitif</option>
                      <option value="Kulit Kering">Kulit Kering</option>
                      <option value="Kulit Berminyak">Kulit Berminyak</option>
                    </select>
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
    $("#add_input").click(function(){
      $(".input-add").append('<div class="input-group input-group-sm">'+
        '<input type="text" class="form-control" name="keluhan[]" placeholder="Masukkan Keluhan">'+
        '<span class="input-group-btn">'+
          '<button class="btn btn-danger btn-flat" type="button" id="del_input">x</button>'+
        '</span>'+
      '</div>');
    });
    $("#del_input").click(function(){ // bind click on every div that has the class box
      $(this).remove(); //remove the clicked element from the dom
    });
  </script>