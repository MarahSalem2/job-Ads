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
              <h3 class="card-title">{{__('cms.edit_advertiserType')}}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
              <form id="create-form">
                @csrf
              <div class="card-body">


                <div class="form-group">
                  <label for="name">{{__('cms.name')}}</label>
                  <input type="text" class="form-control" id="name" value="{{$advertiserType->name}}"
                  placeholder="{{__('cms.name')}}">
                </div>

                </div>
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
      axios.put('/cms/admin/advertiserTypes/{{$advertiserType->id}}', {
        name: document.getElementById('name').value,


      })
      .then(function (response) {
        console.log(response);
        toastr.success(response.data.message);
        window.location.href = '/cms/admin/advertiserTypes';
      })
      .catch(function(error) {
        console.log(error.response);
        toastr.error(error.response.data.message);
      });
  }
</script>
@endsection