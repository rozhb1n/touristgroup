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
    <title>Home</title>
</head>

<body>

    @include('nav');


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


    <div class="container contact-form mt-5 p-5">
        <div class="contact-image">
            <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact" />
        </div>
        <form method="POST" action="{{ route('contact.store') }}">
            @csrf
            <h3>Drop Us a Message</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <input type="text" name="name" class="form-control" placeholder="Your Name *"
                            value="" />
                    </div>
                    @error('name')
                        <h6 class="text-danger">{{ $message }}</h6>
                    @enderror
                    <div class="form-group mb-2">
                        <input type="text" name="email" class="form-control" placeholder="Your Email *"
                            value="" />
                    </div>
                    @error('email')
                        <h6 class="text-danger">{{ $message }}</h6>
                    @enderror
                    <div class="form-group mb-2">
                        <input type="number" name="phone" class="form-control" placeholder="Your Phone Number *"
                            value="" />
                    </div>
                    @error('phone')
                        <h6 class="text-danger">{{ $message }}</h6>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <textarea name="message" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
                    </div>
                </div>
                @error('message')
                    <h6 class="text-danger">{{ $message }}</h6>
                @enderror
            </div>
            <div class="form-group mb-2 ">
                <button type="submit" class="btn bg-warning btn-lg fw-bold">Send</button>
            </div>
        </form>
    </div>
</body>

</html>
