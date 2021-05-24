@include('layout.header')

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-6 col-md-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900">Welcome Back!</h1>
                    <h2 class="h5 text-gray-900 mb-4">AIL (Arsip Induk Langganan)</h2>
                  </div>
                  <form action="{{ route('login') }}" method="post" class="user">
                    @csrf
                    @if(session('errors'))
                    <div class="alert alert-danger alert-dismissible fade show" role='alert'>
                      Something it's wrong
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                      <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                    @endif
                    @if (Session::has('success'))
                    <div class="alert alert-success">
                      {{ Session::get('success') }}
                    </div>
                    @endif
                    @if (Session::has('error'))
                    <div class="alert alert-danger">
                      {{ Session::get('error') }}
                    </div>
                    @endif
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="{{ route('register') }}">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  @include('layout.js')

</body>

</html>
