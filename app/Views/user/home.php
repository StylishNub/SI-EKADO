<?php $this->extend('layout/templateUser'); ?>

<?php $this->section('content'); ?>

<div>
<section class="bg-[#FFBE1A] dark:bg-gray-900 py-8 px-0 lg:py-16" style="margin-left: calc(-50vw + 50%); margin-right: calc(-50vw + 50%); width: 100vw;">
    <div class="mx-auto max-w-screen-xl">
         <img class="img-thumbnail ml-[60px]" src="/img/LogoVokasiUB.png" class="card-img " style="float: right; margin-right: 20px; margin-bottom: 10px; width : 150px;">
        <p class="mt-[-40px] mb-2 ml-[60px] text-left font-bold text-white dark:text-gray-400">
            Selamat Datang <span class="underline"><?= $users; ?></span> kelas <span class="underline"><?= $kelas; ?></span> di Website
        </p>

        <h1 class="mb-2 text-left ml-[60px] mt-0 text-8 font-extrabold tracking-tight leading-none text-[#4F48ED] dark:text-white">SISTEM INFORMASI EVALUASI <br> KINERJA DOSEN </h1>
        <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
        </div>
    </div>
</section>

<section class="bg-[#110F36] dark:bg-gray-900 py-8 px-0 lg:py-16" style="margin-left: calc(-50vw + 50%); margin-right: calc(-50vw + 50%); width: 100vw;">
    <div class="mx-auto max-w-screen-xl">
          <h3 class="text-white font-extrabold mb-2" style="text-align: center;">SEKILAS SIEKADO</h3>
          <img class="img-thumbnail ml-[60px] rounded-lg" src="/img/wew.jpeg" class="card-img" style="float: left; margin-right: 30px; margin-bottom: 10px; width : 150px;">
          <p class="text-white">
            Sistem Informasi Evaluasi Kinerja Dosen (SIEKADO) merupakan sebuah alternatif penilaian Dosen oleh Mahasiswa. Tujuannya sebagai media evaluasi dari hasil kinerja dosen selama mengajar di lingkungan FV UB serta memaksimalkan feedback mahasiswa terhadap dosen. Harapannya sistem ini dapat membangun kenyamanan bagi mahasiswa dan juga dosen dengan terciptanya kegiatan belajar mengajar yang efektif sehingga dapat memaksimalkan potensi terbaik mahasiswa di Vokasi Universitas Brawijaya
          </p>
          <div class="clear-left"></div>
        <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
            <!-- Your content here -->
        </div>
    </div>
</section>

<section class="bg-[#FFBE1A] dark:bg-gray-900 lg:py-16" style="margin-left: calc(-50vw + 50%); margin-right: calc(-50vw + 50%); width: 100vw;">
    <h1 class="text-white text-7 font-bold mt-[-40px] mb-6 pl-4" style="margin-left: 80px;">Dosen Kelas <span class="underline"><?= $kelas; ?></span></h1>
    <div class="flex flex-wrap gap-4 pl-[80px]"> <!-- Parent container with flex display -->
        <?php foreach ($dosen as $a) : ?>
            <a href="/therapy/" class="text-4 font-extrabold text-center">
                <img src="/img/<?= $a['gambar']; ?>" alt="" class="rounded-9 w-full h-[218px] bg-cover bg-center">
            </a>
        <?php endforeach ?>
    </div>
</section>


</div>



<?php $this->endSection(); ?>