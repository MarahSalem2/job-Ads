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
              <h3 class="card-title">{{__('cms.edit_applicant')}}</h3>
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
                    <option value="{{$user->id}}" @if ($applicant->user_id == $user->id) selected
                    @endif>{{$user->name}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="email">{{__('cms.email')}}</label>
                  <input type="text" class="form-control" id="email" value="{{$applicant->email}}"
                  placeholder="{{__('cms.email')}}">
                </div>

                <div class="form-group">
                  <label for="id_number">{{__('cms.id_number')}}</label>
                  <input type="id" class="form-control" id="id_number" value="{{$applicant->id_number}}" 
                  placeholder="{{__('cms.id_number')}}">
                </div>

                <div class="form-group">
                  <label for="phone">{{__('cms.phone')}}</label>
                  <input type="number" class="form-control" id="phone" value="{{$applicant->phone}}" 
                  placeholder="{{__('cms.phone')}}">
                </div>

                <div class="form-group">
                  <label for="gender">{{__('cms.gender')}}</label>
                  <input type="text" class="form-control" id="gender" value="{{$applicant->gender}}" 
                  placeholder="{{__('cms.gender')}}">
                </div>

                <div class="form-group">
                  <label for="date_of_birth">{{__('cms.date_of_birth')}}</label>
                  <input type="date" class="form-control" id="date_of_birth" value="{{$applicant->date_of_birth}}" 
                  placeholder="{{__('cms.date_of_birth')}}">
                </div>

                <div class="form-group">
                  <label>{{__('cms.city')}}</label>
                  <select class="form-control" id="city_id">
                    @foreach ($cities as $city)
                    <option value="{{$city->id}}" @if ($applicant->city_id == $city->id) selected
                    @endif>{{$city->name}}</option>
                    @endforeach
                  </select>
                </div>


                <div class="form-group">
                  <label for="specialization">{{__('cms.specialization')}}</label>
                  <input type="text" class="form-control" id="specialization" value="{{$applicant->specialization}}" 
                  placeholder="{{__('cms.specialization')}}">
                </div>

                <div class="form-group">
                  <label for="qualivication">{{__('cms.qualivication')}}</label>
                  <input type="text" class="form-control" id="qualivication" value="{{$applicant->qualivication}}" 
                  placeholder="{{__('cms.qualivication')}}">
                </div>

                <div class="form-group">
                  <label for="cv">{{__('cms.cv')}}</label>
                  <input type="file" class="form-control" id="cv" placeholder="{{__('cms.cv')}}"
                  placeholder="{{__('cms.cv')}}">
                </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick="performUpdate()" class="btn btn-primary">{{__('cms.save')}}</button>
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
  function performUpdate(){
      // alert('perform Store - FUNCTION JS');
      // console.log('performStore');
    //multipart/form-data
      axios.put('/cms/admin/applicants/{{$applicant->id}}', {
        email: document.getElementById('email').value,
        id_number: document.getElementById('id_number').value,
        phone: document.getElementById('phone').value,
        gender: document.getElementById('gender').value,
        date_of_birth: document.getElementById('date_of_birth').value,
        city_id: document.getElementById('city_id').value,
        specialization: document.getElementById('specialization').value,
        qualivication: document.getElementById('qualivication').value,
        cv: document.getElementById('cv').value,
        user_id: document.getElementById('user_id').value,

      })
      .then(function (response) {
        console.log(response);
        toastr.success(response.data.message);
        window.location.href = '/cms/admin/applicants';
      })
      .catch(function(error) {
        console.log(error.response);
        toastr.error(error.response.data.message);
      });
  }
</script>
@endsection
