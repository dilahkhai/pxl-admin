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
        <!-- Property List -->
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
                                <a href="{{ route('properties.book', $property->id) }}" class="btn btn-success">Book</a>
                            @else
                                <span class="text-muted">Unavailable</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Booking Form -->
        @if(isset($selectedProperty))
        <h2>Book Property: {{ $selectedProperty->type }}</h2>
        <form action="{{ route('bookings.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="property_id" value="{{ $selectedProperty->id }}">

            <div class="mb-3">
                <label for="penyewa" class="form-label">Tenant Name</label>
                <input type="text" id="penyewa" name="penyewa" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label for="nomor_penyewa" class="form-label">Tenant Contact</label>
                <input type="text" id="nomor_penyewa" name="nomor_penyewa" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="NIK" class="form-label">NIK</label>
                <input type="text" id="NIK" name="NIK" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="lampiran_ktp" class="form-label">Upload KTP</label>
                <input type="file" id="lampiran_ktp" name="lampiran_ktp" class="form-control" accept=".jpg,.jpeg,.png,.pdf" required>
            </div>

            <div class="mb-3">
                <label for="harga_tersewa" class="form-label">Rental Price</label>
                <input type="number" step="0.01" id="harga_tersewa" name="harga_tersewa" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="pajak" class="form-label">Tax</label>
                <select id="pajak" name="pajak" class="form-select" required>
                    <option value="y">Yes</option>
                    <option value="n">No</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="DP_1" class="form-label">Down Payment 1</label>
                <input type="number" step="0.01" id="DP_1" name="DP_1" class="form-control">
            </div>

            <div class="mb-3">
                <label for="tanggal_dp_1" class="form-label">Date of DP 1</label>
                <input type="date" id="tanggal_dp_1" name="tanggal_dp_1" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Submit Booking</button>
        </form>
        @endif
    </div>
</body>
</html>
