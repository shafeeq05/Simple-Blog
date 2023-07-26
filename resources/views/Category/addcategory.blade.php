@extends("Layout.welcome")

@section("content")

<form method="POST" action={{(isset($data['tag']['id'])? '/user/dashboard/create-category/' . $data['tag']['id']:'/user/dashboard/create-category')}} enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="tag"><h3>{{$data['entry']??'create'}} Category</h3></label>
      <input  type="text" value="{{$data['tag']['name']??''}}" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="tagname" placeholder="category name">
      @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>

    <button type="submit" class="btn btn-primary">{{$data['entry']??'Create '}} category</button>


  </form>

@endsection
