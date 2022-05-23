@extends('cms.parent')

@section('title',__('cms.advertisings'))
@section('page-lg',__('cms.index'))
@section('main-pg-md',__('cms.advertisings'))
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
              <h3 class="card-title">{{__('cms.advertisings')}}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>{{__('cms.name')}}</th>
                        <th>{{__('cms.description')}}</th>
                        <th>{{__('cms.job_type')}}</th>
                        <th>{{__('cms.section')}}</th>
                        {{-- <th>{{__('cms.advertiserType')}}</th> --}}
                        <th>{{__('cms.advertiser')}}</th>
                        <th>{{__('cms.created_at')}}</th>
                        <th>{{__('cms.updated_at')}}</th>
                        <th style="width: 40px">{{__('cms.settings')}}</th>
                      </tr>
                </thead>
                <tbody>
                    @foreach ($advertisings as $advertising)
                    <tr>
                        <td>{{$advertising->id}}</td>
                        <td>{{$advertising->name}}</td>
                        <td>{{$advertising->description}}</td>
                        <td>{{$advertising->job_type}}</td>
                        <td>{{$advertising->section->name}}</td>
                        {{-- <td>{{$advertising->advertiserType->name}}</td> --}}
                        <td>{{$advertising->advertiser->name}}</td>
                        <td>{{$advertising->created_at}}</td>
                        <td>{{$advertising->updated_at}}</td>
                        <td>
                          <div class="btn-group">
                            <a href="{{route('advertisings.edit',$advertising->id)}}" class="btn btn-warning">
                              <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" onclick="confirmDelete('{{$advertising->id}}', this)" class="btn btn-danger">
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
    axios.delete('/cms/admin/advertisings/'+id)
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

  // function showMessage(id){
  //   Swal.fire(
  //     data.title,
  //     data.text,
  //     data.icon
  //   );
  // }

  }
    
    
</script>    
@endsection