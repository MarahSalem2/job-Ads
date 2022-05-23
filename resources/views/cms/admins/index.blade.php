@extends('cms.parent')

@section('title',__('cms.admins'))
@section('page-lg',__('cms.index'))
@section('main-pg-md',__('cms.admins'))
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
              <h3 class="card-title">{{__('cms.admins')}}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>{{__('cms.name')}}</th>
                        <th>{{__('cms.email')}}</th>
                        <th>{{__('cms.role')}}</th>
                        <th>{{__('cms.created_at')}}</th>
                        <th>{{__('cms.updated_at')}}</th>
                        <th style="width: 40px">{{__('cms.settings')}}</th>
                      </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $admin)
                    <tr>
                        <td>{{$admin->id}}</td>
                        <td>{{$admin->name}}</td>
                        <td>{{$admin->email}}</td>
                        <td>{{$admin->roles[0]->name ?? ''}}</td>
                        <td>{{$admin->created_at}}</td>
                        <td>{{$admin->updated_at}}</td>
                        <td>
                          <div class="btn-group">
                            {{-- @can('Update-Admin') --}}
                            <a href="{{route('admins.edit',$admin->id)}}" class="btn btn-warning">
                              <i class="fas fa-edit"></i>
                            </a>
                            {{-- @endcan --}}
                            {{-- @can('Delete-Admin') --}}
                            <a href="#" onclick="confirmDelete('{{$admin->id}}', this)" class="btn btn-danger">
                              <i class="fas fa-trash"></i>
                            </a>
                            {{-- @endcan --}}
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
    axios.delete('/cms/admin/admins/'+id)
      .then(function (response) {
        console.log(response);
        toastr.success(response.data.message);
        referance.closest('tr').remove();
        showMessage(response.data);
      })
      .catch(function(error) {
        console.log(error.response);
        toastr.error(error.response.data.message);
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