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
            <a href="{{route('permissions.create')}}" type="submit"
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
                  <th>اسم الصلاحية </th>
                  <th> حالة الصلاحية  </th>
                  <th>الاعدادات</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($permissions as $role)
                <tr>
                  <td>{{$permission->id}}</td>
                  <td>{{$permission->role_id}}</td>
                  <td>{{$permission->permission_name}}</td>
                  <td>{{$permission->permission_status}}</td>
                  <td><span class="badge bg-success"> 0 / مستخدم </span></td>

                  <td>
                    <div class="btn group">
                      <a href="{{route('permissions.edit',$permission->id)}}" class="btn btn-primary" title="Edit">
                        تعديل
                        </a>

                      <a href="#" onclick="performDestroy({{$permissions->id}} , this)"  class="btn btn-danger" title="Delete">
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
          {{$permissions->links()}}
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
        let url = '/cms/admin/permissions/'+id;
        confirmDestroy(url ,referance );
    }
  </script>

@endsection


