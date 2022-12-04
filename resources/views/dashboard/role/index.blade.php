@extends('dashboard.master')
@section('title','الدور')

@section('main-title','عرض دور')
@section('sub-title','عرض دور')

@section('styles')
  <style>

</style>
@endsection

@section('content')

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            {{-- <h3 class="card-title">الدور</h3> --}}
            <a href="{{route('roles.create')}}" type="submit"
            class="btn btn-lg btn-success">إضافة دور جديدة</a>
            <div class="card-tools">

              </div>
              <br>
            </div>

          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover table-bordered table-striped text-nowrap text-center">
              <thead>
                <tr class="bg-info">
                  <th>رقم الدور</th>
                  <th>اسم الدور </th>
                  <th>اسم المنطقة </th>
                  <th> عدد المستخدمين </th>
                  <th>الاعدادات</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($roles as $role)
                <tr>
                  <td>{{$role->id}}</td>
                  <td>{{$role->role_name}}</td>
                  <td>{{$role->user_name}}</td>
                  <td><span class="badge bg-success"> 0 / مستخدم </span></td>

                  <td>
                    <div class="btn group">
                      <a href="{{route('roles.edit',$role->id)}}" class="btn btn-primary" title="Edit">
                        تعديل
                        </a>

                      <a href="#" onclick="performDestroy({{$role->id}} , this)"  class="btn btn-danger" title="Delete">
                        حذف
                      </a>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="span text-center" style="margin-top: 20px; margin-bottom:10px">

            </span>

          </div>
          <!-- /.card-body -->
          {{$roles->links()}}
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</section>


@endsection

@section('scripts')

<script>
    function performDestroy(id , referance){
        let url = '/cms/admin/roles/'+id;
        confirmDestroy(url ,referance );
    }
  </script>

@endsection


