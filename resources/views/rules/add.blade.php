<x-dashboard-layout>
    <section class="content-header">
      <h1>
        Dashboard
        <small>Add Rules</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('rules') }}"><i class="fa fa-dashboard"></i> Rules</a></li>
        <li class="active">Add Rules</li>
      </ol>
    </section>
    <section class="content">
     <div class="row">
      <div class="col-md-12">
          <div class="box box-primary">
              <div class="box-header">
                <h3 class="box-title">Tambah Rules</h3>
              </div><!-- /.box-header -->
              <!-- form start -->
              <form role="form" method="POST" action="{{ route('insert-rules') }}">
                <div class="box-body">
                  @csrf
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kode Rule</label>
                    <input type="text" name="kd_rule" required id="kd_rule" class="form-control">
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
                  <div class="form-group">
                    <label for="exampleInputEmail1">Rule</label>
                    <div id="checkbox"></div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Perawatan</label>
                    <select name="hasil" id="kulit" class="form-control">
                      <option value="">Pilih Perawatan</option>
                      @foreach ($treatments as $treatment)
                          <option value="{{$treatment->nama}}">{{$treatment->nama}}</option>
                      @endforeach
                    </select>
                  </div>  
                  <meta name="csrf-token" content="{{ csrf_token() }}" />
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
    $("#kulit").change(function() {
        var provid = $("#kulit").val();
        console.log(provid)
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        if(provid){
        $.ajax({
            type: 'POST',
            url: '{{url('allcomplaints')}}',
            dataType: 'json',
            data:{
              kulit: provid, // Second add quotes on the value.
            },
            success: function(data) {
                $("#checkbox").empty();
                for (let i = 0; i < data.length; i++) {
                console.log(data[i].keluhan)
                    // $("#checkbox").append("<div class='form-check'>");
                    $("#checkbox").append("\
                    <div class='form-check'>\
                      <input type='checkbox' id='rule"+i+"' class='form-check-input' name='rule[]' value="+ data[i].keluhan +">\
                      <label for='rule"+i+"' class='form-check-label'> "+data[i].keluhan+" </label> \
                    </div>");
                    document.getElementById("rule"+i+"").value = data[i].keluhan;
                    // $("#checkbox").append("</div>")

                }
                // console.log(data);
            },
            error: function(data) {
                // console.log(data);
            }
        });
        }
    });
</script>