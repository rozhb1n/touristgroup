<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
    <title>Groups</title>
</head>

<body>

    @if (Session::get('successmessage') != null)
        <div class="position-fixed  end-0 p-3" style="z-index: 11; margin-top: 70px;">
            <div id="liveToast" class="toast show" role="alert">
                <div class="toast-header">
                    <div class="bg-success " style="width: 20px; height: 20px;"></div>
                    <strong class="me-auto mx-2">Success</strong>
                    <button onclick="{document.getElementById('liveToast').style.display = 'none';}" type="button"
                        class="btn-close"></button>
                </div>
                <div class="toast-body">
                    {{ Session::get('successmessage') }}
                </div>
            </div>
        </div>
    @endif

    @if (Session::get('errormessage') != null)
        <div class="position-fixed  end-0 p-3" style="z-index: 11; margin-top: 70px;">
            <div id="liveToast" class="toast show" role="alert">
                <div class="toast-header">
                    <div class="bg-danger " style="width: 20px; height: 20px;"></div>
                    <strong class="me-auto mx-2">Error</strong>
                    <button onclick="{document.getElementById('liveToast').style.display = 'none';}" type="button"
                        class="btn-close"></button>
                </div>
                <div class="toast-body">
                    {{ Session::get('errormessage') }}
                </div>
            </div>
        </div>
    @endif

    <div class="d-flex">

        @include('nav');



        <div class="container " style="margin-top: 150px;">
            <h1 style="margin-bottom: 20px;">Groups </h1>
            <div class="row">
                @foreach ($groups as $group)
                    <div class="col-3 mx-2">
                        <div class="card" style="width: 18rem;">
                            <div class="position-relative">
                                <h6 class="position-absolute fw-bold bg-warning p-2 bottom-0 text-uppercase">{{ $group['place'] }}</h6>
                                <img class="card-img-top" src="{{ $group['placeimage'] }}" alt="Card image cap">
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-center">

                                    <img class="rounded-circle" style="width: 50px; height: 50px; margin-right: 10px;"
                                        src="{{ $group['personimage'] }}" alt="Card image cap">

                                    <div class="">
                                        <h6 class="card-title text-capitalize">{{ $group['name'] }}</h6>
                                        <h6 class="card-title text-capitalize">City-> {{ $group['city'] }}</h6>
                                    </div>
                                </div>
                                <div class="pt-3">
                                    <h6>Date & Time: </h6>
                                    <h6 class="card-title">{{ $group['date'] . '    ' . $group['time'] }}</h6>
                                </div>
                                <p class="card-title">registred People: {{ $group['registred'] }}</p>
                                <button
                                    onclick="{document.getElementById('modalLoginForm').style.display = 'block';
                                document.getElementById('id').value = {{ $group['id'] }};
                                
                                document.getElementById('gn').value = '{{ $group['name'] }}';
                            }"
                                    class="btn btn-warning text-capitalize fw-bold">register</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <div class="position-absolute " style="width: 100%; bottom: 100px; display:none;" id="modalLoginForm">
        <div class="modal-dialog ">
            <form class="modal-content" action="{{ route('register.store') }}" method="POST">
                @csrf
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Register</h4>
                    <button type="button" class="close"
                        onclick="{document.getElementById('modalLoginForm').style.display = 'none';}">
                        <span>&times;</span>
                    </button>
                </div>
                <input type="number" name="group_id" id="id" hidden>
                <input type="text" name="groupname" id="gn" hidden>
                <div class="modal-body mx-3">
                    <div class="md-form mb-2">
                        <label data-error="wrong">Your Name</label>
                        <input type="text" name="name" class="form-control validate">
                    </div>

                    <div class="md-form mb-2">
                        <label data-error="wrong">Your Email</label>
                        <input type="email" name="email" class="form-control validate">
                    </div>

                    <div class="md-form mb-2">
                        <label data-error="wrong">Age</label>
                        <input type="number" name="age" class="form-control validate">
                    </div>

                    <div class="md-form mb-2">
                        <label data-error="wrong">Gneder</label>
                        <select class="form-select" name="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-default btn-warning fw-bold">Register</button>
                </div>
            </form>
        </div>
    </div>


</body>

</html>
