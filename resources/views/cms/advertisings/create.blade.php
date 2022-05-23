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
              <h3 class="card-title">{{__('cms.create_advertising')}}</h3>
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
                  <label for="description">{{__('cms.description')}}</label>
                  <input type="text" class="form-control" id="description" placeholder="{{__('cms.description')}}">
                </div>

                <div class="form-group">
                  <label for="job_type">{{__('cms.job_type')}}</label>
                  <input type="text" class="form-control" id="job_type" placeholder="{{__('cms.job_type')}}">
                </div>


                <div class="form-group">
                  <label>{{__('cms.section')}}</label>
                  <select class="form-control" id="section_id">
                    @foreach ($sections as $section)
                    <option value="{{$section->id}}">{{$section->name}}</option>
                    @endforeach
                  </select>
                </div>


                {{-- <div class="form-group">
                  <label>{{__('cms.advertiserType')}}</label>
                  <select class="form-control" id="advertiserType_id">
                    @foreach ($advertiserTypes as $advertiserType)
                    <option value="{{$advertiserType->id}}">{{$advertiserType->name}}</option>
                    @endforeach
                  </select>
                </div> --}}


                <div class="form-group">
                  <label>{{__('cms.advertiser')}}</label>
                  <select class="form-control" id="advertiser_id">
                    @foreach ($advertisers as $advertiser)
                    <option value="{{$advertiser->id}}">{{$advertiser->name}}</option>
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
      axios.post('/cms/admin/advertisings', {
        name: document.getElementById('name').value,
        description: document.getElementById('description').value,
        job_type: document.getElementById('job_type').value,
        section_id: document.getElementById('section_id').value,
        advertiser_id: document.getElementById('advertiser_id').value,
        // advertiserType_id: document.getElementById('advertiserType_id').value,
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