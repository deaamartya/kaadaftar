<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/dashboard_user.css') }}">
</head>
<body>
    <div class="container">
        <div class="header">
            <tr>
                <a href="{{ url('/peserta/dashboard_user') }}" class="menu1">Dashboard</a>
                <a href="{{ url('/peserta/alur_pembayaran') }}" class="menu2">Alur Pembayaran</a>
                <a href="{{ url('/peserta/konfirmasi_pembayaran') }}" class="menu3">Konfirmasi Pembayaran</a>
                
                @if(Auth::user()->pendaftaran->pembayarans != null)
                    @if(Auth::user()->pendaftaran->pembayarans->status_pembayaran == 1)
                    <!-- form pendaftaran muncul karena sudah bayar tapi belum dikonfirmasi -->
                    <a href="{{ url('/peserta/form_pendaftaran') }}" class="menu4">Form Pendaftaran</a>
                    @endif
                @endif
                
                <a href="{{ url('/peserta/cetak_kartu_peserta') }}" class="menu5">Cetak Kartu Peserta</a>
            </tr>
        </div>
        <div class="conten">

        <!-- Item Profile -->
            <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn"></button>
                    <div id="myDropdown" class="dropdown-content">
                        <a onclick="openForm()">Profile</a>
                        <a href="{{ url('/logout') }}">Logout</a>
                    </div>
            </div>

            <!-- Profile Card -->
            <div class="form-popup" id="myForm">
                <form class="form-container">
                    <div class="card">

                    <p>Name :</p>
                    <h4>{{ auth()->user()->pendaftaran->nama_pendaftar}}</h4>
                    <p>Email :</p>
                    <h4>{{ auth()->user()->pendaftaran->email_pendaftar}}</h4>
                    <p>University :</p>
                    <h4>{{ auth()->user()->pendaftaran->asal_univ_pendaftar}}</h4>

                    </div>
                    <button type="button" class="btn warning" onclick="openFormPass()">Change Password</button>
                    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                </form>
            </div>
            
            <!-- Form Password -->
            <div class="form-popup2" id="myFormPass">
                <form method="POST" action="/gantipassword" class="form-container2">
                {{ csrf_field() }}
                    <h1 style="font-size: 24px; text-align: center;">Change Password</h1>

                    <input type="password" placeholder="Password" name="pwnow" required>

                    <input type="password" placeholder="New Password" name="pwnew" minlength="8" required>

                    <input type="password" placeholder="Confirmation Password" name="pwnew2" required>

                    <button type="submit" class="btn">Submit</button>
                    <button type="button" class="btn cancel" onclick="closeFormPass()">Close</button>
                </form>
            </div>

            <!-- content -->
            <h1 style="font-size: 40px;" class="welcome">Selamat Datang, {{ auth()->user()->pendaftaran->nama_pendaftar}}</h1>

            <div class="bungkus">
                <h2>PENGUMUMAN</h2>

                    <p style="text-align: center;">

						<b>
						    Setelah pembuatan akun berhasil, silahkan mengirim konfirmasi kepada panitia dengan format : Nama_Asal Universitas<br><br>
						    Contact Person :<br>
						    Ishyarotul Robahniya<br>
						    WhatsApp : 087860825309<br>
						    ID Line : icha1n9
						</b>
						
						<br>
						<br>
						
						<b>Untuk menuju tempat kompetisi, silahkan tekan tombol dibawah</b>
						<a class="btn" href="https://kompetisi.kaasemnasunair.com">Click here</a>
						
						
					
					</p>

            </div>
        </div>
    </div>

    <script>
    /* When the user clicks on the button, 
    toggle between hiding and showing the dropdown content */
    function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
        }
        }
    }
    }

    // when the user clicks on the buttom, the form will be showing for profile page
    function openForm() {
    document.getElementById("myForm").style.display = "block";
    }

    // when the user clicks on the buttom, the form will be closing for profile page
    function closeForm() {
    document.getElementById("myForm").style.display = "none";
    }

    // when the user clicks on the buttom, the form will be showing for change password page
    function openFormPass() {
    document.getElementById("myFormPass").style.display = "block";
    }

    // when the user clicks on the buttom, the form will be closing for change password page
    function closeFormPass() {
    document.getElementById("myFormPass").style.display = "none";
    }
    </script>
    
</body>
</html>