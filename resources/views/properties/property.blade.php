@extends('layouts.apps')

@section('main')
    <div class="container py-5">
        <header class="text-center mb-5" style="margin-top: 50px">
        </header>
        <!-- First Row [Prosucts]-->
        <body class="body">
            <form action="{{ route('properties.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-8">
                        <label for="pemilik" class="form-label">Pemilik</label>
                        <input type="text" id="pemilik" name="pemilik" class="form-control" required>
                    </div>
                    
                    <div class="mb-3 col-md-4">
                        <label for="developer" class="form-label">Developer</label>
                        <input type="text" id="developer" name="developer" class="form-control" required>
                    </div>

                    <div class="mb-3 col-md-4">
                        <label for="agent" class="form-label">Agent</label>
                        <input type="text" id="agent" name="agent" class="form-control" required>
                    </div>

                    <div class="mb-3 col-md-4">
                        <label for="type" class="form-label">Type</label>
                        <input type="text" id="type" name="type" class="form-control" required>
                    </div>

                    <div class="mb-3 col-md-4">
                        <label for="tahun_perolehan" class="form-label">Tahun Perolehan</label>
                        <input type="month" id="tahun_perolehan" name="tahun_perolehan" class="form-control" required>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" id="description" name="description" class="form-control" required>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" id="address" name="address" class="form-control" required>
                    </div>


                    <div class="mb-3 col-md-4">
                        <label for="LB" class="form-label">Luas Bangunan</label>
                        <input type="number" id="LB" name="LB" class="form-control" required>
                    </div>

                    <div class="mb-3 col-md-4">
                        <label for="LT" class="form-label">Luas tanah</label>
                        <input type="number" id="LT" name="LT" class="form-control" required>
                    </div>

                    <div class="mb-3 col-md-4">
                        <label for="sertifikat" class="form-label">sertifikat</label>
                        <input type="text" id="sertifikat" name="sertifikat" class="form-control" required>
                    </div>

                    <div class="mb-3 col-md-4">
                        <label for="jumlah_tingkat" class="form-label">Jumlah Tingkat</label>
                        <input type="number" id="jumlah_tingkat" name="jumlah_tingkat" class="form-control" required>
                    </div>

                    <div class="mb-3 col-md-4">
                        <label for="penggunaan" class="form-label">Penggunaan</label>
                        <select id="penggunaan" name="penggunaan" class="form-select" required>
                            <option value="">Pilih Penggunaan</option>
                            <option value="Disewakan">Disewakan</option>
                            <option value="Dijual">Dijual</option>
                            <option value="Dikosongkan">Dikosongkan</option>
                            <option value="Renovasi">Renovasi</option>
                        </select>
                    </div>

                    <div class="mb-3 col-md-4" id="periode_sewa_container" style="display: none;">
                        <label for="periode_sewa" class="form-label">Periode Sewa</label>
                        <select id="periode_sewa" name="periode_sewa" class="form-select" placeholder="Periode Sewa" required>
                            <option value="1 tahun">1 Tahun</option>
                            <option value="6 bulan">6 Bulan</option>
                            <option value="3 bulan">3 Bulan</option>
                            <option value="bulanan">Bulanan</option>
                        </select>
                    </div>

                    <div class="mb-3 col-md-4" id="harga_jual_container" style="display: none;">
                        <label for="harga_jual" class="form-label">Harga Jual</label>
                        <input type="number" step="0.01" id="harga_jual" name="harga_jual" class="form-control" required>
                    </div>


                    <div class="mb-3 col-md-4">
                        <label for="harga_penawaran" class="form-label">Harga Penawaran</label>
                        <input type="number" step="0.01" id="harga_penawaran" name="harga_penawaran" class="form-control" required>
                    </div>

                    <div class="mb-3 col-md-4">
                        <label for="deposit_sewa" class="form-label">Deposit Sewa</label>
                        <input type="number" id="deposit_sewa" name="deposit_sewa" class="form-control" required>
                    </div>

                    <div class="mb-3 col-md-4">
                        <label for="status_pbb" class="form-label">Status PBB</label>
                        <select id="status_pbb" name="status_pbb" class="form-select" required>
                            <option value="sudah bayar">Sudah</option>
                            <option value="belum bayar">Belum</option>
                        </select>
                    </div>

                    <div class="mb-3 col-md-4">
                        <label for="listrik" class="form-label">Listrik</label>
                        <input type="string" id="listrik" name="listrik" class="form-control" required>
                    </div>

                    <div class="mb-3 col-md-4">
                        <label for="air" class="form-label">Air</label>
                        <select id="air" name="air" class="form-select" required>
                            <option value="PDAM">PDAM</option>
                            <option value="artesis">Artesis</option>
                        </select>
                    </div>

                    <div class="mb-3 col-md-4">
                        <label for="ipl" class="form-label">IPL</label>
                        <input type="number" id="ipl" name="ipl" class="form-control" required>
                    </div>

                    <div class="mb-3 col-md-4">
                        <label for="rate_komisi" class="form-label">Rate Komisi</label>
                        <input type="number" id="rate_komisi" name="rate_komisi" class="form-control" required>
                    </div>

                    <div class="mb-3 col-md-4">
                        <label for="status" class="form-label">Status</label>
                        <select id="status" name="status" class="form-select" required>
                            <option value="available">Available</option>
                            <option value="rent">Rent</option>
                            <option value="sold">Sold</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="images" class="form-label">Upload Images</label>
                        <input type="file" id="images" name="images[]" multiple class="form-control" accept=".jpg,.jpeg,.png,.pdf">
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Submit Property</button>
                </div>
            </form>
        </body>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const penggunaanDropDown = document.getElementById('penggunaan');
                const hargaJualContainer = document.getElementById('harga_jual_container');
                const hargaJualInput = document.getElementById('harga_jual');
                const periodeSewaContainer = document.getElementById('periode_sewa_container');
                const periodeSewaInput = document.getElementById('periode_sewa');

                penggunaanDropDown.addEventListener('change', function () {
                    if (this.value === 'Dijual') {
                        hargaJualContainer.style.display = 'block';
                        hargaJualInput.setAttribute('required', 'required');
                    } else {
                        hargaJualContainer.style.display = 'none';
                        hargaJualInput.removeAttribute('required');
                        hargaJualInput.value = '';
                    }
                })

                penggunaanDropDown.addEventListener('change', function () {
                    if (this.value === 'Disewakan') {
                        periodeSewaContainer.style.display = 'block';
                        periodeSewaInput.setAttribute('required', 'required');
                    } else {
                        periodeSewaContainer.style.display = 'none';
                        periodeSewaInput.removeAttribute('required');
                        periodeSewaInput.value = '';
                    }
                })

            })
        </script>
    </div>
@endsection