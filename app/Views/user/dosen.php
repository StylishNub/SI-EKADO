<?php $this->extend('layout/templateUser'); ?>

<?php $this->section('content'); ?>

<div class="bg-[#110F36] dark:bg-gray-900 lg:py-16" style="margin-left: calc(-50vw + 50%); margin-right: calc(-50vw + 50%); width: 100vw;">
    <div class="bg-white w-[30%] mb-[60px] mt-[-30px]">
        <h1 class="text-black font-extrabold text-7 ml-[40px]">DOSEN KELAS <span class="underline"><?= $kelas; ?></span> </h1>
    </div>

    <?php foreach ($dosen as $a) : ?>
        <a href="/profile_dosen/<?= $a['nama']; ?>">
            <section class="bg-[#FFBE1A] dark:bg-gray-900 w-[70%] h-[20%] mx-auto mt-[30px] rounded-lg border-4 border-white">
                <div class="py-8 mx-auto max-w-screen-xl text-center flex items-center justify-between">
                    <div class="text-left flex items-center">
                        <img src="/img/<?= $a['gambar']; ?>" class="rounded-5 p-2 w-[50%] h-[30%] float-left" alt="">
                        <div class="ml-4">
                            <h3 class="font-bold text-[20px] mt-[-10px] text-white"><?= $a['nama']; ?></h3>
                            <h5 class="text-[12px] font-bold text-white"><?= $a['nidn']; ?> - <?= $a['mk']; ?></h5>
                        </div>
                    </div>
                    <div class="text-right ml-4 mr-2 w-1/2 ">
                        <p class="text-4 font-bold text-left truncate pr-4"><?= $a['deskripsi']; ?></p>
                    </div>
                </div>
            </section>
        </a>
    <?php endforeach ?>
</div>

<?php $this->endSection(); ?>
