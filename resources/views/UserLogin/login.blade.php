
    @extends("Layout.welcome")

    @section("content")
    <form class="form" action='/user/do-login' method="POST">
        @csrf
        <!-- Email input -->
        <div class="form-outline mb-4">
          <input type="text"  name="username" id="form2Example1" class="form-control" />
          <label class="form-label" for="form2Example1">Email address</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
          <input type="password" name="password" id="form2Example2" class="form-control" />
          <label class="form-label" for="form2Example2">Password</label>
        </div>



        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>


      </form>


@endsection
