<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <img class="nav-item nav-profile">
        <a  class="nav-link" >
            <div class="nav-profile-text d-flex flex-column align-items-center">
                <img src="{{asset("assets/images/faces/foto2-.jpg")}}"s alt="profile" style="width:100px"> <br>

                <a style="color: #0b0e11; ">
                    <span  class="font-weight-bold mb-2">Neslişah Ebral Durdu</span>
                </a>
                <span class="text-secondary text-small">Bilişim Sistemleri Mühendisi</span>
            </div>
        </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route("admin")}}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route("biyografiEkle")}}">
                <span class="menu-title">biyografi</span>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route("foto")}}">
                <span class="menu-title">fotoğraflar</span>
                <i class="mdi mdi-contacts menu-icon"></i>
            </a>
        </li>
    </ul>
</nav>
