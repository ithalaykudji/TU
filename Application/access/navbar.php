<nav class="navbar navbar-expand-lg navbar-dark bg-info fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" href="./">
        <span class="d-block d-lg-none">Clarence Taylor</span>
        <span class="d-none d-lg-block"><img class="img-fluid img-profile mx-auto mb-2" src="Assets/img/logo-unwira.png" alt="..." /></span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="./">Home</a></li>
            <?php if(isset($_SESSION['id-user'])){if($_SESSION['id-role']==1){?>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="users">Users</a></li>
            <?php }if($_SESSION['id-role']<=2){?>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="pegawai">Pegawai</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="mhs-baru">Mahasiswa Baru</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="mhs-wisuda">Mahasiswa Wisuda</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="data-wisuda">Data Wisuda</a></li>
            <?php }?>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="Application/controller/logout">Logout</a></li>
            <?php }if(!isset($_SESSION['id-user'])){?>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="?auth=1/">Login</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="?auth=2/">Registrasi</a></li>
            <?php }?>
        </ul>
    </div>
</nav>
    