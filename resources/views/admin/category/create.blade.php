@extends('admin.layouts.app');


@section('content')
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Category</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="categories.html" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
    <form action="" method="post" id="categoryForm">
        @csrf
        <div class="card">
            <div class="card-body">								
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Name">	
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug">	
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="inputStatus">Status</label>
                            <select id="inputStatus" class="form-control custom-select" name="status">
                                <option selected="" disabled="">Select one</option>
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                           
                                </select>
                        </div>
                    </div>	
                    								
                </div>
            </div>							
        </div>
        <div class="pb-5 pt-3">
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="#" class="btn btn-outline-dark ml-3">Cancel</a>
        </div>
    </form>
    </div>
    <!-- /.card -->
</section> 
@endsection
@section('customJs')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#categoryForm').submit(function(event) {
            event.preventDefault();
            var form = $(this);

            $.ajax({
                url: '{{ route('categories.store') }}',
                type: 'POST',
                data: form.serialize(),
                dataType: 'json',
                success: function(response) {
                 var errors = response['errors']
                    console.log(response);
                    
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Handle the error response
                    console.log('Error:', errorThrown);
                    // Optionally, you can display an error message to the user
                }
            });
        });
    });
</script>

@endsection
