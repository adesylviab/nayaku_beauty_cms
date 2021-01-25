<!-- Content Header (Page header) -->
<x-dashboard-layout>
    <section class="content-header">
        <h1>
          Detail Tips {{$tips->judul}}
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="{{ route('tips') }}">Tips</a></li>
        </ol>
      </section>
    
      <!-- Main content -->
      <section class="content">
    
        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">History by - {{$tips->judul}}</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <table class="table table-bordered">
                <tr>
                    <td>Nama: </td>
                    <td>{{$tips->judul}}</td>
                </tr>
                <tr>
                    <td>Keluhan: </td>
                    <td>
                        <div class="form-group">
                            {!!$tips->post!!}
                          </div>
                    </td>
                </tr>
                <tr>
                    <td>Tanggal: </td>
                    <td>{{date_format(date_create($tips->created_at),"l, d m Y")}}</td>
                </tr>
            </table>
          </div><!-- /.box-body -->
          <div class="box-footer">
            By Nayaku Beauty v.1.0
          </div><!-- /.box-footer-->
        </div><!-- /.box -->
    
      </section><!-- /.content -->
    </x-dashboard-layout>