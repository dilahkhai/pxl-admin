<!-- Blade Template for Properties and Booking -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Properties and Booking</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Available Properties</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Owner</th>
                    <th>Agent</th>
                    <th>Developer</th>
                    <th>Type</th>
                    <th>Address</th>
                    <th>Use</th>
                    <th>Rent Period</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($properties as $property)
                    <tr>
                        <td>{{ $property->pemilik }}</td>
                        <td>{{ $property->agent }}</td>
                        <td>{{ $property->developer }}</td>
                        <td>{{ $property->type }}</td>
                        <td>{{ $property->address }}</td>
                        <td>{{ $property->penggunaan }}</td>
                        <td>{{ $property->periode_sewa }}</td>
                        <td>{{ $property->status }}</td>
                        <td>
                            @if($property->status === 'available')
                                <a href="{{ route('books.book', $property->id) }}" class="btn btn-success">Book</a>
                            @else
                                <span class="text-muted">Unavailable</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
