@extends('Layout.welcome')

@section('content')
@if (session('msg'))

<script>
    jSuites.notification({
       name: "{{ session()->get('msg') }}",
       message: 'Successfully Update',
   })
   // alert("{{ session()->get('msg') }}" );
</script>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table">
    <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">name</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @if (isset($data))

        @foreach ($data as $item )
        <tr>
            <td scope="row">{{$item['id']}}</td>
            <td>{{$item['name']}}</td>
            <td ><a href="/tags/{{$item['id']}}" class="btn btn-secondary">Edit</a> <a href="/deletetag/{{$item['id']}}" class="btn btn-danger ">Delete</a></td>
        </tr>

        @endforeach
        @endif
    </tbody>
  </table>

@endsection
