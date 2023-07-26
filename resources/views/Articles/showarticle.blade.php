@extends('Layout.welcome')

@section('content')
{{-- {{$data}} --}}
<div class="container">


    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card">
                @if (count($data)==0)
                    <h4>No data found</h4>
                @endif
                {{-- src={{$data['image_path']}} --}}
                <img class="card-img-top" src={{ asset('storage/images/'.$data['article']['image']) }}  alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">{{$data['article']['title']}}</h4>
                    <h5 class="card-body">Discription</h5>
                    <p class="card-text">{{$data['article']['description']}}</p>
                    <p class="card-text">category : {{$data['article']['category']}} </p>
                    <p class="card-text">Tag : {{$data['article']['tag']}} </p>
                    <a href="/user/dashboard/edit-article/{{$data['article']['id']}}" class="btn btn-secondary">Edit</a>
                    <a href="/user/dashboard/delete-article/{{$data['article']['id']}}" class="btn btn-danger">Delete</a>
                </div>
             </div>
            </div>


    </div>
</div>
@endsection

