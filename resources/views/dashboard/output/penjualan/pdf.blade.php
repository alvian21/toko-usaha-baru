<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laporan Penjualan | Summary</title>
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
            width: 40cm;
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
            text-align: center;
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
            /* text-align: center; */
        }

        table td.service,
        table td.desc {
            vertical-align: top;
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
    </style>
</head>

<body>
    <header class="clearfix">
        <h3 style="text-align: left">{{date('H:i d F, Y')}}</h3>

        <h1 style="color: #34abeb">Laporan Penjualan | Summary</h1>

        <h3 class="center" style="color: #eb5f34">{{$periode1}} - {{$periode2}}</h3>

    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Penjualan</th>
                    <th>ID Transaksi</th>
                    <th>Tanggal</th>
                    <th>Customer</th>
                    <th>Status Pembayaran</th>
                    <th>Biaya Kirim</th>
                    <th>Total Barang</th>
                    <th>Total Pembayaran</th>
                </tr>

            </thead>
            <tbody>
                @php
                $totalbayar = 0;
                $totalbarang = 0;
            @endphp
                @forelse ($penjualan as $item)
                <tr>
                    <td>{{$item->status_penjualan}}</td>
                    <td>{{$item->id}}</td>
                    <td>{{$item->tgl_transaksi}}</td>
                    @if (isset($item->customer->nama_lengkap))
                    <td>{{$item->customer->nama_lengkap}}</td>

                    @else
                    <td></td>
                    @endif
                    <td>{{$item->status_pembayaran}}</td>
                    <td>{{$item->ongkir}}</td>
                    <td>{{$item->total_barang}}</td>
                    @php
                        $total = 0 + $item->ongkir;
                        $totalbarang += $item->total_barang;
                    @endphp
                    @forelse ($item->detail as $row)
                        @php
                            $total += $row->jumlah_barang * $row->harga;
                        @endphp
                    @empty

                    @endforelse
                    <td>@rupiah($total)</td>
                    @php
                        $totalbayar += $total;
                    @endphp
                </tr>
                @empty

                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6" class="text-center">Total</td>
                    <td>{{$totalbarang}}</td>
                    <td>@rupiah($totalbayar)</td>
          
                </tr>
            </tfoot>
        </table>

    </main>

</body>

</html>
