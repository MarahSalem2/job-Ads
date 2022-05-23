@extends('cms.parent')

@section('title',__('cms.advertiserTypes'))
@section('page-lg',__('cms.index'))
@section('main-pg-md',__('cms.advertiserTypes'))
@section('page-md',__('cms.index'))

@section('styles')
    
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">{{__('cms.advertiserTypes')}}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>{{__('cms.name')}}</th>
                        <th>{{__('cms.created_at')}}</th>
                        <th>{{__('cms.updated_at')}}</th>
                        <th style="width: 40px">{{__('cms.settings')}}</th>
                      </tr>
                </thead>
                <tbody>
                    @foreach ($advertiserTypes as $advertiserType)
                    <tr>
                        <td>{{$advertiserType->id}}</td>
                        <td>{{$advertiserType->name}}</td>
                        <td>{{$advertiserType->created_at}}</td>
                        <td>{{$advertiserType->updated_at}}</td>
                        <td>
                          <div class="btn-group">
                            <a href="{{route('advertiserTypes.edit',$advertiserType->id)}}" class="btn btn-warning">
                              <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" onclick="confirmDelete('{{$advertiserType->id}}', this)" class="btn btn-danger">
                              <i class="fas fa-trash"></i>
                            </a>
                          </div>
                        </td>
                    </tr>    
                    @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
            </div>
          <!-- /.card -->

        </div>
        <!-- /.col -->
 
      </div>
  
    </div><!-- /.container-fluid -->
  </section>
@endsection

@section('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(id, referance) {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
    if (result.isConfirmed) {
      performDelete(id);
  }
  });

  function performDelete(id){
    axios.delete('/cms/admin/advertiserTypes/'+id)
      .then(function (response) {
        console.log(response);
        // toastr.success(response.data.message);
        referance.closest('tr').remove6();
        showMessage(response.data);
      })
      .catch(function(error) {
        console.log(error.response);
        // toastr.error(error.response.data.message);
        showMessage(error.response.data);
      });
  }



  }
    
    
</script>    
@endsection