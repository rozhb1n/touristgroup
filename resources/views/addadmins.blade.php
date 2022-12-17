<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>signin</title>
</head>

<body>


    <section class="vh-100" >

        <div class="d-flex justify-content-center align-items-center">
            @include('sidebar')

            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-10">
                        <div class="card" style="border-radius: 1rem;">
                            <div class="row g-0 d-flex justify-content-center">
                                <div class="col-md-6 col-lg-7 d-flex align-items-center ">
                                    <div class="card-body p-4 p-lg-5 text-black ">

                                        <form action="{{ route('admin.store') }}" method="POST">
                                            @csrf
                                            <div class="d-flex align-items-center mb-3 pb-1">
                                                <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                                <span class="h1 fw-bold mb-0">Add users</span>
                                            </div>


                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="name">Name</label>
                                                <input type="text" name="name" id="name"
                                                    class="form-control form-control-lg" />
                                                @error('name')
                                                    <h6 class="text-danger">{{ $message }}</h6>
                                                @enderror
                                            </div>

                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="email">Email address</label>
                                                <input type="email" name="email" id="email"
                                                    class="form-control form-control-lg" />
                                                @error('email')
                                                    <h6 class="text-danger">{{ $message }}</h6>
                                                @enderror
                                            </div>
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="password">Password</label>
                                                <input type="password" name="password" id="password"
                                                    class="form-control form-control-lg" />
                                                @error('password')
                                                    <h6 class="text-danger">{{ $message }}</h6>
                                                @enderror
                                            </div>
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="cpassword">Confirm Password</label>
                                                <input type="password" name="cpassword" id="cpassword"
                                                    class="form-control form-control-lg" />
                                            </div>
                                            @error('cpassword')
                                                <h6 class="text-danger">{{ $message }}</h6>
                                            @enderror
                                            <div class="pt-1 mb-4">
                                                <button class="btn btn-warning btn-lg fw-bold btn-block" type="submit"
                                                    style="width: 100%;">Add</button>
                                            </div>


                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
