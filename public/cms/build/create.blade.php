@extends('dashboard.master')

@section('title','المشرف')





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
                        <h3 class="card-title">انشاء مشرف</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="create_form">
                        @csrf
                       <div class="card-body">

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="first_name">الاسم الاول </label>
                                    <input type="text" name="first_name" class="form-control"
                                        id="first_name" placeholder="أدخل الاسم الاول  ">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="last_name">الاسم الاخير </label>
                                    <input type="text" name="last_name" class="form-control"
                                        id="last_name" placeholder="أدخل الاسم الاخير  ">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="email">الايميل</label>
                                    <input type="text" name="email" class="form-control"
                                        id="email" placeholder="ادخل الايميل  ">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="password">كلمة المرور</label>
                                    <input type="text" name="password" class="form-control"
                                        id="password" placeholder="أدخل كلمة المرور   ">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="mobile">رقم الهاتف  </label>
                                    <input type="text" name="mobile" class="form-control"
                                        id="mobile" placeholder="ادخل رقم الهاتف ">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="date">   تاريخ الميلاد </label>
                                    <input type="date" name="date" class="form-control"
                                        id="date" placeholder="أدخل تاريخ الميلاد  ">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="gender">  الجنس</label>
                                    <select class="form-control" name="gender" style="width: 100%;"
                                        id="gender" aria-label=".form-select-sm example">
                                        {{-- <option selected> {{ $admins->user->job_title }} </option> --}}
                                        <option value="ذكر"> ذكر </option>
                                        <option value="أنثى">أنثى</option>
    
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="id_number"> رقم الهوية </label>
                                    <input type="text" name="id_number" class="form-control"
                                        id="id_number" placeholder="أدخل رقم الهوية   ">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="city_id"> لمدينة</label>
                                    <select class="form-control" name="city_id" style="width: 100%;"
                                        id="city_id" aria-label=".form-select-sm example">
                                        {{-- <option selected> {{ $admins->user->job_title }} </option> --}}
                                    
                                    @foreach ($cities as $city )
                                    <option value="{{ $city->id }}" >{{ $city->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" class="form-control" id="image"
                                       placeholder="Enter Image">
                              </div>
                            </div>

                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="button" onclick="performStore()"
                                    class="btn btn-lg btn-success">حفظ</button>

                                    <a href="{{route('admins.index')}}" type="submit"
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
        function performStore(){
            let formData = new FormData();
            formData.append('first_name',document.getElementById('first_name').value);
            formData.append('last_name',document.getElementById('last_name').value);
            formData.append('email',document.getElementById('email').value);
            formData.append('password',document.getElementById('password').value);
            formData.append('mobile',document.getElementById('mobile').value);
            formData.append('date',document.getElementById('date').value);
            formData.append('gender',document.getElementById('gender').value);
            formData.append('id_number',document.getElementById('id_number').value);
            formData.append('image',document.getElementById('image').files[0]);

            formData.append('city_id',document.getElementById('city_id').value);

            store('/cms/admin/admins' ,formData );

        }
        </script>
@endsection
