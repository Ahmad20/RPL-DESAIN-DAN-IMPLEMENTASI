<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/coursematerial.css">
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
    @include('pengajar.partials.sidebar')

    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn'></i>
                <span class="course">Course Material</span>
            </div>
        <form method="POST" action="{{ url('pengajar/course-material/tambah') }}">
            @csrf
            <label for="course" style="margin-top: 500px; margin-left: -990px; font-size: 130%">Course:</label>
            <select name="courseName" id="course" style="height:35px; width:350px; margin-left: 50px;">
                <option value="{{ session()->get('course') }}" selected>{{ session()->get('course') }}</option>
                @foreach ($courses as $c)
                    <option value='{{ $c->name }}'>{{ $c->name }}</option>
                @endforeach
            </select>
            @error('courseName')
                {{ $message }}
            @enderror
            <div>
                <label for="slide" style="margin-top: 20px; margin-left: -990px; font-size: 130%">Slide:</label>
                <input type="text" id="slide" name="slide" placeholder="URL Slide" style="margin-top: 20px; margin-left: 50px; height:35px; width: 700px"> 
            </div>
            <div>
                <label for="video" style="margin-top: 20px; margin-left: -990px; font-size: 130%">Video:</label>
                <input type="text" id="video" name="video" placeholder="URL Video" style="margin-top: 20px; margin-left: 50px; height:35px; width: 700px">
            </div>
            <div>
                <label for="kuis" style="margin-top: 20px; margin-left: -990px; font-size: 130%">Kuis:</label>
                <input type="text" id="kuis" name="kuis" placeholder="URL Kuis" style="margin-top: 20px; margin-left: 50px; height:35px; width: 700px">
            </div>
            <div>
                <label for="tugas" style="margin-top: 20px; margin-left: -990px; font-size: 130%">Tugas:</label>
                <input type="text" id="tugas" name="tugas" placeholder="URL Tugas" style="margin-top: 20px; margin-left: 50px; height:35px; width: 700px">
            </div>
            <div>
                <label for="referensi" style="margin-top: 20px; margin-left: -990px; font-size: 130%">Ref:</label>
                <input type="text" id="referensi" name="referensi" placeholder="URL Referensi" style="margin-top: 20px; margin-left: 50px; height:35px; width: 700px">
            </div>
            <button class="btn btn-primary" type="submit" style="margin-top: 30px; margin-left: -990px; background: rgb(185, 39, 39)">Tambah Material</button>
        </form>
    </nav>
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
