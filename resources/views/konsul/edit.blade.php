<x-dashboard-layout>
    <section class="content-header">
      <h1>
        Dashboard
        <small>Add Product</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('treatments') }}"><i class="fa fa-dashboard"></i> Product</a></li>
        <li class="active">Add Product</li>
      </ol>
    </section>
    <section class="content">
     <div class="row">
      <div class="col-md-12">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
          <div class="box box-primary">
              <div class="box-header">
                <h3 class="box-title">Tambah Product</h3>
              </div><!-- /.box-header -->
              <!-- form start -->
              <form role="form" method="POST" action="{{ route('update-product',$product->id) }}" enctype="multipart/form-data">
                <div class="box-body">
                  @csrf
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Product</label>
                    <input name="produk" type="text" value="{{$product->nama}}" class="form-control" id="perawatan" placeholder="Nama Produk">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Harga Product</label>
                    <input name="harga" type="number" value="{{$product->harga}}" class="form-control" id="kd_perawatan" placeholder="Harga Produk">
                  </div>
                  <div class="form-group">
                    <label for="foto">Foto Product</label>
                    <input name="foto" type="file" class="form-control" id="kd_perawatan">
                  </div>
                  <div class="form-group">
                    <label for="deskripsi">Deskripsi Product</label>
                    <textarea name="deskripsi" class="form-control" id="editor1" rows="10" cols="80">{{$product->deskripsi}}</textarea>
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
    CKEDITOR.replace( 'editor1' );
  </script>