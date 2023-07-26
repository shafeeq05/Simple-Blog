@extends('Layout.welcome')

@section('content')



{{-- {{isset($errors)?$errors:''}} --}}
<form action={{(isset($data['id'])? '/user/dashboard/create-article/' . $data['id']:'/user/dashboard/create-article')}} method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <input type="text" value="{{$data['title']??''}}"  class="form-control" name="title" placeholder="Article title">
        <p class="alert-danger">{{$errors->first()?$errors->first('title'):''}}</p>

    </div>
    <div class="form-group">
    <input type="text" value="{{$data['description']??''}}"  class="form-control" name="description" placeholder="discription">
    <p class="alert-danger">{{$errors->first()?$errors->first('description'):''}}</p>
     </div>
    <div class="form-group">
    <select name="category" id="">
        <option value="cate">select Category</option>

        @foreach ($data['categories'] as $item )
        <option value={{$item['id']}} {{$item['id']==($data['category']??'')?'selected':''}}>{{$item['name']}}</option>

        @endforeach

    </select>
    <p class="alert-danger">{{$errors->first()?$errors->first('category'):''}}</p>
    </div>
    <div class="form-group">
    <select name="tag" id="" >
        <option value="tag">select Tag</option>


        @foreach ($data['tags'] as $item)
        <option value={{$item['id']}} {{$item['id']==($data['tag']??'')?'selected':''}}>{{$item['name']}}</option>
        @endforeach

    </select>

    </div>
    @if (isset($data->image))
        <img class="w-25 h-auto"  src={{ asset('storage/images/'.$data['image']) }} alt="image" srcset="">

    @endif
    <div class="form-group">
    <input type="file" name="image" value={{$data['image']??''}} >
    </div>
    <button class="btn btn-primary" type="submit">Submit</button>

</form>


@endsection
