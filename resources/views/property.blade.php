<div class="container py-5">
        <header class="text-center mb-5" style="margin-top: 50px">
            <h1 class="display-4 font-weight-bold">Happy People Are The Prettiest</h1>
            <p class="font-italic text-muted mb-0">People whose smile is open and whose expression is glad has a kind of</p>
            <p class="font-italic text-muted mb-0">beauty no matter what they wears.</p>
            <p class="font-italic text-muted">Beauty is whatever gives joy.</p>
            <img src="https://i.pinimg.com/564x/52/60/37/52603746586bf0568cfa6781dfe91498.jpg" alt="" srcset="">
            <img src="https://i.pinimg.com/564x/f7/75/1b/f7751ba2250fd2cf500770f2b1cb11cd.jpg" alt=""
                srcset="">
            <img src="https://i.pinimg.com/564x/a2/45/f3/a245f379a2f2c7f7730b1c3bd6ead721.jpg" alt="" srcset=""
                style="margin-top: 20px">
            <img src="https://i.pinimg.com/564x/75/c6/f9/75c6f966e331a8a39861f706cee35a84.jpg" alt="" srcset=""
                style="margin-top: 20px">
            <img src="https://i.pinimg.com/564x/58/18/29/5818297a947b80110b807d319872ae43.jpg" alt="" srcset=""
                style="margin-top: 20px">
            <img src="https://i.pinimg.com/564x/b8/21/6f/b8216fcea865cd3c924a236752d06fa3.jpg" alt="" srcset=""
                style="margin-top: 20px">
        </header>
        <!-- First Row [Prosucts]-->
        <body class="body">
            <form action="{{ route('properties.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="property_id" value="{{ $selectedProperty->id }}">

            <div class="mb-3">
                <label for="pemilik" class="form-label">Pemilik</label>
                <input type="text" id="pemilik" name="pemilik" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label for="developer" class="form-label">Developer</label>
                <input type="text" id="developer" name="developer" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" id="description" name="description" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" id="address" name="address" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="tahun_perolehan" class="form-label">Tahun Perolehan</label>
                <input type="month" id="tahun_perolehan" name="tahun_perolehan" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="LB" class="form-label">Luas Bangunan</label>
                <input type="number" id="LB" name="LB" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="LT" class="form-label">Luas tanah</label>
                <input type="number" id="LT" name="LT" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="sertifikat" class="form-label">sertifikat</label>
                <input type="text" id="sertifikat" name="sertifikat" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="jumlah_tingkat" class="form-label">Jumlah Tingkat</label>
                <input type="number" id="jumlah_tingkat" name="jumlah_tinglat" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="penggunaan" class="form-label">Penggunaan</label>
                <select id="penggunaan" name="penggunaan" class="form-select" required>
                    <option value="Dijual">Dijual</option>
                    <option value="Disewakan">Disewakan</option>
                    <option value="Dikosongkan">Dikosongkan</option>
                    <option value="Renovasi">Renovasi</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="periode_sewa" class="form-label">Periode Sewa</label>
                <select id="periode_sewa" name="periode_sewa" class="form-select" required>
                    <option value="1 tahun">1 Tahun</option>
                    <option value="6 bulan">6 Bulan</option>
                    <option value="3 bulan">3 Bulan</option>
                    <option value="bulanan">Bulanan</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="status_pbb" class="form-label">Status PBB</label>
                <select id="status_pbb" name="status_pbb" class="form-select" required>
                    <option value="sudah bayar">Sudah</option>
                    <option value="bulan bayar">Belum</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="harga_penawaran" class="form-label">Harga Penawaran</label>
                <input type="number" step="0.01" id="harga_penawaran" name="harga_penawaran" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="deposit_sewa" class="form-label">Deposit Sewa</label>
                <input type="number" id="deposit_sewa" name="deposit_sewa" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="harga_jual" class="form-label">Harga Jual</label>
                <input type="number" step="0.01" id="harga_jual" name="harga_jual" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="lampiran_ktp" class="form-label">Upload KTP</label>
                <input type="file" id="lampiran_ktp" name="lampiran_ktp" class="form-control" accept=".jpg,.jpeg,.png,.pdf" required>
            </div>


            <button type="submit" class="btn btn-primary">Submit Booking</button>
        </form>
        <!-- <div class="row">
            @foreach ($data as $item)
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <div class="card">
                        <div class="card-body">
                            <img src="imagecare/{{ $item->image }}" class="card-img-top" alt="...">
                            <h5 class="card-title">{{ $item->product }}</h5>
                            <p style="color:darkgrey">{{ $item->stok }} pcs</p>
                            <h5 style="color:deepskyblue">Rp. {{ number_format($item->price) }}</h5>
                            @if($property->status === 'available')
                                <a href="{{ route('properties.book', $property->id) }}" class="btn btn-success">Book</a>
                            @else
                                <span class="text-muted">Unavailable</span>
                            @endif
                            <br>
                        </div>
                    </div>
                    <br>
                </div>
            @endforeach
        </div> -->
        </body>
    </div>