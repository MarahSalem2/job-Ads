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
              <h3 class="card-title">{{__('cms.create_advertiser')}}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
              <form id="create-form">
                @csrf
              <div class="card-body">


                <div class="form-group">
                  <label for="name">{{__('cms.name')}}</label>
                  <input type="text" class="form-control" id="name" placeholder="{{__('cms.name')}}">
                </div>

                <div class="form-group">
                  <label for="email">{{__('cms.email')}}</label>
                  <input type="text" class="form-control" id="email" placeholder="{{__('cms.email')}}">
                </div>

                <div class="form-group">
                  <label>{{__('cms.advertiserType')}}</label>
                  <select class="form-control" id="advertiserType_id">
                    @foreach ($advertiserTypes as $advertiserType)
                    <option value="{{$advertiserType->id}}">{{$advertiserType->name}}</option>
                    @endforeach
                  </select>
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
                  <label for="location">{{__('cms.location')}}</label>
                  <input type="text" class="form-control" id="location" placeholder="{{__('cms.location')}}">
                </div>

                <div class="form-group">
                  <label>{{__('cms.applicant')}}</label>
                  <select class="form-control" id="applicant_id">
                    @foreach ($applicants as $applicant)
                    <option value="{{$applicant->id}}">{{$applicant->user->name}}</option>
                    @endforeach
                  </select>
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
      axios.post('/cms/admin/advertisers', {
        name: document.getElementById('name').value,
        email: document.getElementById('email').value,
        advertiserType_id: document.getElementById('advertiserType_id').value,
        location: document.getElementById('location').value,
        city_id: document.getElementById('city_id').value,
        applicant_id: document.getElementById('applicant_id').value,


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
