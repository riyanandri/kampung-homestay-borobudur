<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Faktur</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }

        .font {
            font-size: 15px;
        }

        .authority {
            /*text-align: center;*/
            float: right
        }

        .authority h5 {
            margin-top: -10px;
            color: brown;
            /*text-align: center;*/
            margin-left: 35px;
        }

        .thanks p {
            color: brown;
            ;
            font-size: 16px;
            font-weight: normal;
            font-family: serif;
            margin-top: 20px;
        }
    </style>

</head>

<body>

    <table width="100%" style="background: #F7F7F7; padding:0 20px 0 20px;">
        <tr>
            <td valign="top">
                <!-- {{-- <img src="" alt="" width="150"/> --}} -->
                <h2 style="color: brown; font-size: 26px;"><strong>KampungHomestay</strong></h2>
            </td>
            <td align="right">
                <pre class="font">
               Kampung Homestay Borobudur
               Email : borobudurkampunghomestay@gmail.com <br>
               No Hp : 0858-7946-2172 <br>
               Dusun Ngaran 2, Borobudur, Magelang <br>
            </pre>
            </td>
        </tr>

    </table>


    <table width="100%" style="background:white; padding:2px;"></table>

    <table width="100%" style="background: #F7F7F7; padding:0 5 0 5px;" class="font">

        <thead class="table-light">
            <tr>
                <th>Tipe Kamar</th>
                <th>Total Kamar</th>
                <th>Harga</th>
                <th>Tgl Check In/Out</th>
                <th>Total Hari</th>
                <th>Total </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $editData->room->roomType->name }}</td>
                <td>{{ $editData->number_of_rooms }}</td>
                <td>{{ formatRupiah($editData->actual_price) }}</td>
                <td>
                    <span class="badge bg-primary">{{ $editData->check_in }}</span> /<br>
                    <span class="badge bg-warning text-dark">{{ $editData->check_out }}</span>
                </td>
                <td>{{ $editData->total_night }}</td>
                <td>{{ formatRupiah($editData->actual_price * $editData->number_of_rooms) }}</td>

            </tr>
        </tbody>

    </table>
    <br />

    <table class="table test_table" style="float: right" border="none">
        <tr>
            <td>Subtotal</td>
            <td>{{ formatRupiah($editData->subtotal) }}</td>
        </tr>
        <tr>
            <td>Diskon</td>
            <td>{{ formatRupiah($editData->discount) }}</td>
        </tr>
        <tr>
            <td>Grand Total</td>
            <td>{{ formatRupiah($editData->total_price) }}</td>
        </tr>
    </table>





    <table class="table test_table" style="float:right; border:none">

    </table>


    <div class="thanks mt-3">
        <p>Terima kasih atas pesanan anda..!!</p>
    </div>
    <div class="authority float-right mt-5">
        <p>-----------------------------------</p>
        <h5>Authority Signature</h5>
    </div>
</body>

</html>
