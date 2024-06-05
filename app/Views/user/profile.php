<?php $this->extend('layout/templateUser'); ?>

<?php $this->section('content'); ?>

<div class="bg-[#110F36] dark:bg-gray-900 h-screen px-36" style="margin-left: calc(-50vw + 50%); margin-right: calc(-50vw + 50%); width: 100vw;">

    <section class="bg-[#FFBE1A] dark:bg-gray-900 mx-auto rounded-lg border-4">

<div class="rounded-lg p-12 ml-25 flex items-center justify-start">
    <img src="/img/<?= esc($user['gambar']); ?>" alt="" class="rounded-lg bg-cover bg-center">
    <div>
        <h2 class="text-2xl font-bold mb-2 ml-[150px]">Profil</h2>
        <p class="mb-4"><span class="font-semibold ml-[150px]">Nama:</span> <?= esc($user['name']) ?></p>
        <p class="mb-4"><span class="font-semibold ml-[150px]">Email:</span> <?= esc($user['email']) ?></p>
        <p class="mb-4"><span class="font-semibold ml-[150px]">Level:</span> <?= esc($user['level']) ?></p>
        <p class="mb-4"><span class="font-semibold ml-[150px]">Kelas:</span> <?= esc($user['kelas']) ?></p>
    </div>
</div>

        <a href="<?= base_url('logout') ?>">
            <button class="bg-red-600 text-white font-bold py-2 px-4 rounded-lg mt-4 mb-8 ml-24">Logout</button>
        </a>
    </section>
</div>


<?php $this->endSection(); ?>
