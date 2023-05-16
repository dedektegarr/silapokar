<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $page_title }}</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .yth {
            position: relative;
        }

        .yth::before {
            content: 'Yth.';
            position: absolute;
            left: -2em;
        }

        .ttd {
            max-width: 300px;
            margin-top: 5rem;
            margin-left: auto;
        }

        .ttd-h4 {
            font-size: 1rem;
            font-weight: bold;
            text-align: center;
            letter-spacing: -.5px
        }

        .ttd-h4.nama {
            border-bottom: 1px solid black;
        }

        .nip {
            display: block;
            text-align: center;
        }
    </style>
</head>

<body>
    <section class="container"
        style="color:black;font-family: 'Times New Roman', serif; margin-top: 2rem; font-size: 1.1rem">
        <div class="row mt-4">
            <div class="col-md-12">

                @php
                    $tanggal = \Carbon\Carbon::parse($kebakaran->tanggal)->locale('id');
                    $tgl_buat = \Carbon\Carbon::parse($kebakaran->laporan->tgl_buat)->locale('id');
                    $now = \Carbon\Carbon::now()->locale('id');
                    $waktu_mulai = \Carbon\Carbon::parse($kebakaran->waktu_mulai)->locale('id');
                    $waktu_selesai = \Carbon\Carbon::parse($kebakaran->waktu_selesai)->locale('id');
                    $pemilik_arr = explode(',', $kebakaran->pemilik);
                @endphp

                {{-- COP --}}
                <div class="row align-items-center">
                    <div class="col">
                        <img src="{{ asset('storage/img/kota-bengkulu.png') }}" alt="Kota Bengkulu.png"
                            class="img-fluid" style="max-width:120px" />
                    </div>
                    <div class="col-10">
                        <div style="transform: translateX(-2rem)">
                            <h3 class="text-center">PEMERINTAH KOTA BENGKULU</h3>
                            <h2 class="text-center font-weight-bold">DINAS PEMADAM KEBAKARAN DAN PENYELAMATAN</h2>
                            <!-- <h1 class="text-center">KELURAHAN TENGAH PADANG</h1> -->
                            <p class="text-center">Jln.Bhayangkara No.47 Km.9 Telp. (0736) 5523 - 003 Call
                                Center.0811-7351-113</p>
                        </div>

                    </div>
                </div>

                <div class="line" style="margin-top: -1rem">
                    <hr style="border:3px solid #000">
                    <hr style="border:.5px solid #000; margin-top: -15px">
                </div>

                {{-- PERIHAL --}}
                <div class="row">
                    <div class="col">
                        <table cellspacing="0">
                            <tr>
                                <td>Nomor</td>
                                <td>:</td>
                                <td>{{ $kebakaran->laporan->nomor }}</td>
                            </tr>
                            <tr>
                                <td>Sifat</td>
                                <td>:</td>
                                <td>{{ $kebakaran->laporan->sifat }}</td>
                            </tr>
                            <tr>
                                <td>Lampiran</td>
                                <td>:</td>
                                <td>{{ $kebakaran->laporan->lampiran ? '-' : '' }}</td>
                            </tr>
                            <tr>
                                <td>Perihal</td>
                                <td>:</td>
                                <td><strong>{{ $kebakaran->laporan->perihal }}</strong></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col">
                        <div style="margin-left: 5rem">
                            <span class="d-block">Bengkulu, {{ $tgl_buat->translatedFormat('d M Y') }}</span>
                            <br>
                            <span>Kepada</span>
                            <br>
                            <span class="yth">Bapak Walikota Bengkulu</span>
                            <span>Cq. Asisten I Sekretariat Daerah Kota Bengkulu di-</span>
                        </div>
                    </div>
                </div>

                {{-- ISI --}}
                <div class="row justify-content-center" style="margin-top: 5rem">
                    <div class="col-10">
                        <p>Dengan hormat, <br>
                            Bersama surat ini, kami sampaikan Laporan terjadinya Kebakaran sebgai berikut :
                        </p>

                        <div class="row">
                            <div class="col-1">1.</div>
                            <div class="col-4">Hari / Tanggal</div>
                            <div>:</div>
                            <div class="col">{{ $tanggal->translatedFormat('l, d M Y') }}</div>
                        </div>
                        <div class="row">
                            <div class="col-1">2.</div>
                            <div class="col-4">Terima Laporan Dari</div>
                            <div>:</div>
                            <div class="col">{{ $kebakaran->pelapor }}</div>
                        </div>
                        <div class="row">
                            <div class="col-1">3.</div>
                            <div class="col-4">Alamat</div>
                            <div>:</div>
                            <div class="col">{{ $kebakaran->alamat }}</div>
                        </div>
                        <div class="row">
                            <div class="col-1">4.</div>
                            <div class="col-4">Jenis yang terbakar</div>
                            <div>:</div>
                            <div class="col">{{ $kebakaran->jenis }}</div>
                        </div>
                        <div class="row">
                            <div class="col-1">5.</div>
                            <div class="col-4">Pemilik / Penghuni</div>
                            <div>:</div>
                            <div class="col">
                                <ol>
                                    @foreach ($pemilik_arr as $pemilik)
                                        <li>{{ $pemilik }}</li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1">6.</div>
                            <div class="col-4">Wilayah / Bagian yang terbakar</div>
                            <div>:</div>
                            <div class="col">{{ $kebakaran->jenis }}</div>
                        </div>
                        <div class="row">
                            <div class="col-1">7.</div>
                            <div class="col-4">Waktu Kejadian</div>
                            <div>:</div>
                            <div class="col">{{ $waktu_mulai->translatedFormat('h:i') }} wib s/d
                                {{ $waktu_selesai->translatedFormat('h:i') }}
                                wib</div>
                        </div>
                        <div class="row">
                            <div class="col-1">8.</div>
                            <div class="col-4">Hasil Penanggulangan Kebakaran</div>
                            <div>:</div>
                            <div class="col">{{ $kebakaran->hasil }}</div>
                        </div>
                        <div class="row">
                            <div class="col-1">9.</div>
                            <div class="col-4">Asal Api</div>
                            <div>:</div>
                            <div class="col">{{ $kebakaran->hasil }}</div>
                        </div>
                        <div class="row">
                            <div class="col-1">10.</div>
                            <div class="col-4">Satuan Pemadam Kebakaran kembali ke Pangkalan</div>
                            <div>:</div>
                            <div class="col">Pukul {{ $kebakaran->spk_kembali }} wib</div>
                        </div>
                        <div class="row">
                            <div class="col-1">11.</div>
                            <div class="col-4">Taksiran Kerugian
                                <div class="row">
                                    <div class="col-1">1.</div>
                                    <div class="col-4">Korban Manusia / Luka Bakar</div>
                                    <div>:</div>
                                    <div class="col">{{ $kebakaran->kerugian->korban_manusia }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-1">2.</div>
                                    <div class="col-4">Benda</div>
                                    <div>:</div>
                                    <div class="col">{{ $kebakaran->kerugian->benda }}</div>
                                </div>
                            </div>
                            <div>:</div>
                        </div>
                        <div class="row">
                            <div class="col-1">12.</div>
                            <div class="col-4">Keterangan
                                <div class="row">
                                    <div class="col-1">1.</div>
                                    <div class="col-4">Anggota</div>
                                    <div>:</div>
                                    <div class="col">{{ $kebakaran->keterangan->anggota }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-1">2.</div>
                                    <div class="col-4">Armada</div>
                                    <div>:</div>
                                    <div class="col">{{ $kebakaran->keterangan->armada }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-1">3.</div>
                                    <div class="col-4">Respon Time</div>
                                    <div>:</div>
                                    <div class="col">{{ $kebakaran->keterangan->respon_time }} wib</div>
                                </div>
                            </div>
                            <div>:</div>
                        </div>

                        <p class="mt-5">Demikian laporan ini disampaikan kepada Bapak, atas perhatiannya terimakasih.
                        </p>

                        <div class="row">
                            <div class="col">
                                <div class="ttd">
                                    <h4 class="ttd-h4">
                                        KEPALA DINAS
                                        PEMADAM KEBAKARAN DAN
                                        PENYELAMATAN KOTA
                                        BENGKULU
                                    </h4>
                                    <br><br><br>
                                    <h4 class="ttd-h4 nama">YULIANSYAH, SE., MM</h4>
                                    <label for="" class="nip">Nip. 197206051993031006</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        window.print();
    </script>
</body>

</html>
