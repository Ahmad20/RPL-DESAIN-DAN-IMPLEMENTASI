<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/course.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css"
        integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>RPL THOMATH</title>
</head>

<body>
    @include('wali.partials.sidebar')

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn'></i>
                <span class="course">Edit Profile</span>
            </div>
            <form method="POST"
                action="{{ url('walimurid/profile', Auth::guard('walimurid')->user()->id_wali_murid) }}">
                @csrf
                <div style="margin-top: 400px; margin-left: -990px; margin-right: 200px">
                    <label for="courseName" style="font-size: small">Nama</label>
                    <input style="margin-left: 60px; margin-top:-35px" name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        id="courseName" value="{{ Auth::guard('walimurid')->user()->name }}"  autofocus>
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
                <div style="margin-left: -990px; margin-right: 200px; margin-top:20px">
                    <label for="email" style="font-size: small">Email</label>
                    <input style="margin-left: 60px; margin-top:-35px" name="email" type="text" class="form-control @error('email') is-invalid @enderror"
                        id="email" value="{{ Auth::guard('walimurid')->user()->email }}"  >
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
                <div style="margin-left: -990px; margin-right: 240px; margin-top:20px">
                    <label for="phoneNumber" style="font-size: small">No Telepon</label>
                    <input style="margin-left: 100px; margin-top:-35px" name="phoneNumber" type="text" class="form-control @error('phoneNumber') is-invalid @enderror"
                        id="phoneNumber" value="{{ Auth::guard('walimurid')->user()->phone_number }}">
                    @error('phoneNumber')
                        {{ $message }}
                    @enderror
                </div>
                <div style="margin-left: -990px; margin-right: 280px; margin-top:20px">
                    <label for="oldPassword" style="font-size: small">Password Lama</label>
                    <input style="margin-left: 140px; margin-top:-35px" name="oldPassword" type="password" class="form-control @error('oldPassword') is-invalid @enderror"
                        id="oldPassword" >
                    @error('oldPassword')
                        {{ $message }}
                    @enderror
                </div>
                <div style="margin-left: -990px; margin-right: 280px; margin-top:20px">
                    <label for="newPassword" style="font-size: small">Password Baru</label>
                    <input style="margin-left: 140px; margin-top:-35px" name="newPassword" type="password" class="form-control @error('newPassword') is-invalid @enderror"
                        id="newPassword" >
                    @error('newPassword')
                        {{ $message }}
                    @enderror
                </div>
                <button class="btn btn-primary" type="submit"
                    style="margin-top: 30px; margin-left: -990px; background-color: rgb(185, 39, 39)">Submit</button>
            </form>
        </nav>
    </section>
    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else
                sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
