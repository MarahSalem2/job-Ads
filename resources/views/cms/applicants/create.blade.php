@extends('cms.parent')

@section('title','temp')
@section('page-lg','temp')
@section('main-pg-md','cms')
@section('page-md','temp')

@section('styles')
    
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">{{__('cms.create_applicant')}}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
              <form id="create-form">
                @csrf
              <div class="card-body">

                <div class="form-group">
                  <label>{{__('cms.user')}}</label>
                  <select class="form-control" id="user_id">
                    @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="email">{{__('cms.email')}}</label>
                  <input type="text" class="form-control" id="email" placeholder="{{__('cms.email')}}">
                </div>

                <div class="form-group">
                  <label for="id_number">{{__('cms.id_number')}}</label>
                  <input type="id" class="form-control" id="id_number" placeholder="{{__('cms.id_number')}}">
                </div>

                <div class="form-group">
                  <label for="phone">{{__('cms.phone')}}</label>
                  <input type="number" class="form-control" id="phone" placeholder="{{__('cms.phone')}}">
                </div>

                <div class="form-group">
                  <label for="gender">{{__('cms.gender')}}</label>
                  <input type="text" class="form-control" id="gender" placeholder="{{__('cms.gender')}}">
                </div>

                <div class="form-group">
                  <label for="date_of_birth">{{__('cms.date_of_birth')}}</label>
                  <input type="date" class="form-control" id="date_of_birth" placeholder="{{__('cms.date_of_birth')}}">
                </div>

                <div class="form-group">
                  <label>{{__('cms.city')}}</label>
                  <select class="form-control" id="city_id">
                    @foreach ($cities as $city)
                    <option value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label>{{__('cms.specialization')}}</label>
                  <select class="form-control" id="specialization_id">
                    @foreach ($specializations as $specialization)
                    <option value="{{$specialization->id}}">{{$specialization->name}}</option>
                    @endforeach
                  </select>
                </div>


                <div class="form-group">
                  <label for="qualivication">{{__('cms.qualivication')}}</label>
                  <input type="text" class="form-control" id="qualivication" placeholder="{{__('cms.qualivication')}}">
                </div>

                <div class="form-group">
                  <label for="cv">{{__('cms.cv')}}</label>
                  <input type="file" class="form-control" id="cv" placeholder="{{__('cms.cv')}}">
                </div>

                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick="performStore()" class="btn btn-primary">{{__('cms.save')}}</button>
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
@endsection

@section('scripts')
 {{-- <script src="{{asset('js/axios.js')}}"></script>   --}}
<script>
  function performStore(){
      // alert('perform Store - FUNCTION JS');
      // console.log('performStore');
    //multipart/form-data
      axios.post('/cms/admin/applicants', {
        email: document.getElementById('email').value,
        id_number: document.getElementById('id_number').value,
        phone: document.getElementById('phone').value,
        gender: document.getElementById('gender').value,
        date_of_birth: document.getElementById('date_of_birth').value,
        city_id: document.getElementById('city_id').value,
        specialization_id: document.getElementById('specialization_id').value,
        qualivication: document.getElementById('qualivication').value,
        cv: document.getElementById('cv').value,
        user_id: document.getElementById('user_id').value,


      })
      .then(function (response) {
        console.log(response);
        toastr.success(response.data.message);
        document.getElementById('create-form').reset();
      })
      .catch(function(error) {
        console.log(error.response);
        toastr.error(error.response.data.message);
      });
  }
</script>
@endsection