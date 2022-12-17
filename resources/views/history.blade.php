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

        <div class="container mt-5 pt-5">
            <h2>Groups History</h2>
            <p>This are the list of Groups History</p>
           
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
                    @foreach ($history as $history)
                        <tr>
                            <td>{{ $history['name'] }}</td>
                            <td><img style="width:80px;height:auto;" src="{{ $history['personimage'] }}" alt="">
                            </td>
                            <td>{{ $history['city'] }}</td>
                            <td>{{ $history['place'] }}</td>
                            <td>
                                <img style="width:90px;height:auto;" src="{{ $history['placeimage'] }}" alt="">
                            </td>
                            <td>{{ $history['date'] . '    ' . $history['time'] }}</td>
                            <td>{{ $history['registred'] }}</td>
                            <td>
                                <div class="d-flex">
                                    <form action="{{ route('history.destroy', $history['id']) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            <i class="bi-trash text-danger"></i>
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

</body>

</html>
