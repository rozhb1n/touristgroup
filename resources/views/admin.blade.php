<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Admin</title>
</head>

<body>

    @if (Session::get('successmessage') != null)
        <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
            <div id="liveToast" class="toast show" role="alert">
                <div class="toast-header">
                    <div class="bg-success " style="width: 20px; height: 20px;"></div>
                    <strong class="me-auto mx-2">Success</strong>
                    <button onclick="{document.getElementById('liveToast').style.display = 'none';}" type="button" class="btn-close"></button>
                </div>
                <div class="toast-body">
                    {{ Session::get('successmessage') }}
                </div>
            </div>
        </div>
    @endif


    <div class="d-flex">
        @include('sidebar')

        <div class="py-2">

        </div>

        <div class="" style="width:100%;">
            <div class="container mt-3">
                <h2>Admins</h2>
                <p>This are the list of Admins</p>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user['name'] }}</td>
                                <td>{{ $user['email'] }}</td>
                                <td>{{ $user['created_at'] }}</td>
                                <td>
                                    <form action="{{ route('admin.destroy', $user['id']) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            <i class="bi-trash text-danger"></i>
                                        </button>

                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                    <div>
                        {!! $users->links() !!}
                    </div>
                </table>
            </div>

            <div class="py-5">

            </div>

            <div class="container mt-3">
                <h2>Groups</h2>
                <p>This are the list of Groups</p>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Person Image</th>
                            <th>city</th>
                            <th>Place</th>
                            <th>Place Image</th>
                            <th>Date & Time</th>
                            <th>Registred</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($groups as $group)
                            <tr>
                                <td>{{ $group['name'] }}</td>
                                <td><img style="width:80px;height:auto;" src="{{ $group['personimage'] }}"
                                        alt=""></td>
                                <td>{{ $group['city'] }}</td>
                                <td>{{ $group['place'] }}</td>
                                <td>
                                    <img style="width:90px;height:auto;" src="{{ $group['placeimage'] }}"
                                        alt="">
                                </td>
                                <td>{{ $group['date'] . '    ' . $group['time'] }}</td>
                                <td>{{ $group['registred'] }}</td>
                                <td>
                                    <div class="d-flex">
                                        <form action="{{ route('group.destroy', $group['id']) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                <i class="bi-trash text-danger"></i>
                                            </button>

                                        </form>
                                        <a class="px-3" href="{{ route('group.edit', $group['id']) }}">

                                            Edit
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            <div>
                                {!! $groups->links() !!}
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>


</body>

</html>
