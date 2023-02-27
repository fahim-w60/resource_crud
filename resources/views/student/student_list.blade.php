<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">

      
        <table class="table table-striped">
            <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            @foreach ($students as $key => $student)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->address }}</td>
                    <td><img src="{{asset($student->image)}}" class="img-fluid" style="height:100px;width:80px;" alt=""></td>
                    <td style="display:flex;">
                        <a href="{{ route('crud.edit',$student->id) }}" class="btn btn-outline-primary mx-2">Edit</a>
                        <form action="{{ route('crud.destroy',$student->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-danger" onclick="confirm('Are you Sure Want TO Delete?')">Delete</button>
                        </form>
                        
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    </div>
</div>