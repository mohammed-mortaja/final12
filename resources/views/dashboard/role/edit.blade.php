@extends('dashboard.master')

@section('title',' الدور')

@section('main-title','تعديل دور')
@section('sub-title','تعديل دور')

@section('styles')

@endsection

@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">تعديل دور</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="create_form">
                        @csrf
                       <div class="card-body">

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="user_name">تعديل اسم الدور </label>
                                    <input type="text" name="user_name" class="form-control"
                                        id="user_name" value="{{$roles->user_name}}"
                                        placeholder="أدخل اسم الدور  ">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="role_name">تعديل اسم المستخدم </label>
                                    <input type="text" name="role_name" class="form-control"
                                        id="role_name" value="{{$roles->role_name}}"
                                        placeholder="أدخل اسم المستخدم  ">
                                </div>
                             
                            </div>

                    

                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="button" onclick="performUpdate({{$roles->id}})"
                                    class="btn btn-lg btn-success">تعديل</button>
                              
                                    <a href="{{route('roles.index')}}" type="submit"
                                    class="btn btn-lg btn-secondary">إلغاء</a>
                            </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

</section>
<!-- /.content -->

@endsection

@section('scripts')
    <script>

        function performUpdate(id){
            let formData = new FormData();
            formData.append('role_name',document.getElementById('role_name').value);
            formData.append('user_name',document.getElementById('user_name').value);
            storeRoute('/cms/admin/roles_update/'+id , formData);

        }
        </script>
@endsection
