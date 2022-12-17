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

    <div class="d-flex">
        @include('sidebar')

        <div class="" style="width:100%;">
            <div class="container mt-5 pt-5">
                <h2>Peoples</h2>
                <p>This are the list of registered people</p>
                <form class="d-flex" action="{{ route('register.index') }}" method="GET">
                    <select class="form-select " style="width: 250px;" name="name">
                        @foreach ($groupname as $groupname)
                            <option value="{{ $groupname['name'] }}">{{ $groupname['name'] }}</option>
                        @endforeach
                    </select>
                    <button class="btn bg-warning fw-bold ms-4">Filter</button>
                </form>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Group Name</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Age</th>
                            <th>Gneder</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($registers as $register)
                            <tr>
                                <td>{{ $register['groupname'] }}</td>
                                <td>{{ $register['name'] }}</td>
                                <td>{{ $register['email'] }}</td>
                                <td>{{ $register['age'] }}</td>
                                <td>{{ $register['gender'] }}</td>
                                <td>
                                    <div class="d-flex">
                                        <form action="{{ route('register.destroy', $register['id']) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-danger">
                                                Reject
                                            </button>

                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>
