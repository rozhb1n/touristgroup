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
                <h2>Contact</h2>
                <p>This are the list of Messages</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>phone Number</th>
                            <th>message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contact as $contact)
                            <tr>
                                <td>{{ $contact['name'] }}</td>
                                <td>{{ $contact['email'] }}</td>
                                <td>{{ $contact['phone'] }}</td>
                                <td>{{ $contact['message'] }}</td>
                                <td>
                                    <div class="d-flex">
                                        <form action="{{ route('contact.destroy', $contact['id']) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-danger">
                                                Delete
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
