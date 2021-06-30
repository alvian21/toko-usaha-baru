<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laporan Penjualan | Detail</title>
    <style>
        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #5D6975;
            text-decoration: underline;
        }

        body {
            position: relative;
            width: 30cm;
            height: 29.7cm;
            margin: 0 auto;
            color: #001028;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 12px;
            font-family: Arial;
        }

        header {
            padding: 10px 0;
            margin-bottom: 30px;
        }

        #logo {
            text-align: center;
            margin-bottom: 10px;
        }

        #logo img {
            width: 90px;
        }

        h1 {
            border-top: 1px solid #5D6975;
            border-bottom: 1px solid #5D6975;
            color: #5D6975;
            font-size: 2.4em;
            line-height: 1.4em;
            font-weight: normal;
            text-align: center;
            margin: 0 0 20px 0;
            background: url("../images/dimension.png");
        }

        #project {
            float: left;
        }

        #project span {
            color: #5D6975;
            text-align: right;
            width: 52px;
            margin-right: 10px;
            display: inline-block;
            font-size: 0.8em;
        }

        #company {
            float: right;
            text-align: right;
        }

        #project div,
        #company div {
            white-space: nowrap;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table tr:nth-child(2n-1) td {
            background: #F5F5F5;
        }

        table th,
        table td {
            /* text-align: center; */
            font-size: 1.2em;
        }

        table th {
            padding: 5px 20px;
            color: #5D6975;
            border-bottom: 1px solid #C1CED9;
            white-space: nowrap;
            font-weight: normal;
        }

        table .service,
        table .desc {
            text-align: left;
        }

        table td {
            padding: 20px;
            text-align: center;
        }

        table td.service,
        table td.desc {
            vertical-align: top;
        }

        table td.sub {
            border-top: 1px solid #C1CED9;
        }

        table td.grand {
            border-top: 1px solid #5D6975;
            ;
        }

        #notices .notice {
            color: #5D6975;
            font-size: 1.2em;
        }

        footer {
            color: #5D6975;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #C1CED9;
            padding: 8px 0;
            text-align: center;
        }

        .center {
            text-align: center;
        }

        .span {
            font-size: 5rem
        }

        table td.total {
            font-size: 1.2em;
        }

        table td.grand {
            border-top: 1px solid #5D6975;
        }

        table td.right {
            text-align: right;
        }

        table td.left {
            text-align: left;
        }
    </style>
</head>

<body>
    <header class="clearfix">
        <h3 style="text-align: left">{{date('H:i d F, Y')}}</h3>

        <h1 style="color: #34abeb">Laporan Penjualan | Detail</h1>
        <h3 class="center" style="color: #eb5f34">{{$periode1}} - {{$periode2}}</h3>
    </header>
    @forelse ($penjualan as $item)

    <header class="clearfix">
        <div id="project">
            <div><span style="font-size: 12px">Transaksi</span> : {{$item->status_penjualan}}</div>
            <div><span style="font-size: 12px">Customer</span> :
                @if (isset($item->customer->nama_lengkap))
                {{$item->customer->nama_lengkap}}

                @else
                    -
                @endif
            </div>
            <div><span style="font-size: 12px">Tanggal</span> : {{$item->tgl_transaksi}}</div>
        </div>

    </header>
    <main>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Sub Total</th>
                </tr>

            </thead>
            <tbody>

                @php
                    $total = 0;
                @endphp

                @forelse ($item->detail as $row)
                <tr>
                    <td >{{$loop->iteration}}</td>
                    <td >{{$row->item_id}} | {{$row->nama_barang}}</td>
                    <td >{{$row->jumlah_barang}}</td>
                    <td >@rupiah($row->harga)</td>

                    @php
                    $subtotal = $row->harga * $row->jumlah_barang;
                    @endphp
                    <td >@rupiah($subtotal)</td>
                </tr>
                @php
                   $total +=  $subtotal
                @endphp
                @empty

                @endforelse

                {{-- diskon dan pajak --}}



                <tr>

                    <td colspan="4" class="right">Grand Total</td>
                    <td class="sub total" align="right">@rupiah($total)</td>
                </tr>

            </tbody>

        </table>

    </main>

    @empty

    @endforelse
</body>

</html>
