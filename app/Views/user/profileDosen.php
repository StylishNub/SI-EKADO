<?php $this->extend('layout/templateUser'); ?>

<?php $this->section('content'); ?>

<div class="bg-[#110F36] dark:bg-gray-900 h-screen py-8 px-16 lg:py-16" style="margin-left: calc(-50vw + 50%); margin-right: calc(-50vw + 50%); width: 100vw;">

    <section class="bg-[#FFBE1A] dark:bg-gray-900 mx-auto rounded-lg border-4 border-white">
        <?php foreach ($dosen as $a) : ?>
            <div class="py-8 mx-auto max-w-screen-xl text-center flex items-center justify-between mt-4">
                <div class="text-left flex items-center">
                    <img src="/img/<?= $a['gambar']; ?>" class="p-2 w-[50%] h-[30%] mt-[-40px] float-left" alt="">
                    <div class="ml-4">
                        <h3 class="font-bold text-[20px] mt-[-10px] text-white"><?= $a['nama']; ?></h3>
                        <h5 class="text-[12px] font-bold text-white"><?= $a['nidn']; ?> - <?= $a['mk']; ?></h5>
                    </div>
                </div>
                <div class="text-right ml-4 w-8/12 ">
                    <p class="text-4 font-bold text-left mr-4"><?= $a['deskripsi']; ?></p>
                </div>
            </div>
        <?php endforeach ?>
    </section>
</div>

<?php $this->endSection(); ?>
