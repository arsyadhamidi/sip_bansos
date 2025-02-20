<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif
        }
    </style>
</head>

<body>
    <table style="width: 100%">
        <tr>
            <td style="width: 20%">
                <img src="{{ public_path('images/logo.png') }}" style="width: 100px; height: 100px;" alt="">
            </td>
            <td style="text-align: center">
                <h2>
                    PEMERINTAH KOTA PADANG PANJANG <br>
                    KECAMATAN PADANG PANJANG TIMUR <br>
                    KELURAHAN GUGUK MALINTANG
                </h2>
                <p style="margin-top: -10px;">
                    Jln. MR.M. Roem No.14 Telp.(0752) 82225 Kode Pos. 27128
                </p>
            </td>
        </tr>
    </table>
    <hr>
    <table style="width: 100%">
        <tr>
            <td style="width: 8%">Nomor</td>
            <td style="width: 3%;">:</td>
            <td style="width: 50%;">005/{{ $results->id ?? '0' }}/GM-PPT/{{ \Carbon\Carbon::now()->format('m') }}-2025
            </td>
            <td style="20%">
                Padang Panjang, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
            </td>
        </tr>
        <tr>
            <td style="width: 8%">Sifat</td>
            <td style="width: 3%;">:</td>
            <td style="width: 50%;">Biasa</td>
            <td style="20%"></td>
        </tr>
        <tr>
            <td style="width: 8%">Lampiran</td>
            <td style="width: 3%;">:</td>
            <td style="width: 50%;">-</td>
            <td style="20%"></td>
        </tr>
        <tr>
            <td style="width: 8%">Perihal</td>
            <td style="width: 3%;">:</td>
            <td style="width: 50%;">
                <i>Data Penerima Bantuan Beras CPP</i>
            </td>
            <td style="20%"></td>
        </tr>
    </table>

    <br>

    <p>Kepada Yth:</p>
    <p>Bpk/Ibuk {{ $results->penerima ?? '-' }}</p>
    <p>di Guguk Malintang</p>

    <p>Dengan hormat,</p>
    <p>
        Dalam upaya untuk meningkatkan ketahanan pangan dan mendukung masyarakat yang membutuhkan, pemerintah telah
        meluncurkan program Cadangan Pangan Pemerintah (CPP) yang menyediakan bantuan beras kepada keluarga yang kurang
        mampu. Program ini bertujuan untuk memastikan bahwa setiap keluarga memiliki akses yang memadai terhadap pangan
        yang bergizi, terutama dalam situasi sulit seperti bencana alam atau krisis ekonomi.
    </p>
    <p>
        Data penerima bantuan beras CPP sangat penting untuk memastikan bahwa bantuan yang diberikan tepat sasaran. Oleh
        karena itu, pengumpulan data penerima bantuan dilakukan dengan cermat dan teliti. Data ini mencakup informasi
        lengkap mengenai identitas penerima, termasuk nama, alamat, jumlah anggota keluarga, dan kondisi sosial ekonomi.
        Dengan data yang akurat, pemerintah dapat memastikan bahwa bantuan beras disalurkan kepada keluarga yang
        benar-benar membutuhkan.
    </p>
    <p>
        Kami mengucapkan terima kasih kepada semua pihak yang terlibat dalam pengumpulan dan pengelolaan data penerima
        bantuan beras CPP. Kerja keras dan dedikasi Anda sangat berharga dalam mewujudkan tujuan program ini. Mari kita
        bersama-sama berkomitmen untuk terus mendukung upaya peningkatan ketahanan pangan dan kesejahteraan masyarakat
        Indonesia.
    </p>
    <table style="width: 100%">
        <tr>
            <td style="width: 50%"></td>
            <td style="width: 50%; text-align: center;">
                <b>
                    An.LURAH GUGUK MALINTANG <br>
                    KECAMATAN PADANG PANJANG TIMUR <br>
                </b>
                <p style="margin-top: -2px;">Sekretaris</p>
                <br>
                <br>
                <br>
                <b>
                    <u>MUHAMAD RAFLIS,SH</u><br>
                    NIP 19691110 200701 1 012
                </b>
            </td>
        </tr>
    </table>
</body>

</html>
