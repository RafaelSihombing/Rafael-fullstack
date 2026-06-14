<!DOCTYPE html>
<html>

<head>
    <title>Transaksi</title>
</head>

<body>

    <h2>Form Input Transaksi</h2>

    @if(session('success'))
    <p>{{ session('success') }}</p>
    @endif

    <form method="POST" action="/transaksi">

        @csrf

        <input
            type="text"
            name="nama_barang"
            placeholder="Nama Barang">

        <br><br>

        <input
            type="number"
            name="jumlah"
            placeholder="Jumlah">

        <br><br>

        <input
            type="number"
            name="harga"
            placeholder="Harga">

        <br><br>

        <button type="submit">
            Simpan
        </button>

    </form>

    <br>

    <a href="/logout">
        Logout
    </a>

</body>

</html>