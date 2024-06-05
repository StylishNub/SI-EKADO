<?php $this->extend('layout/templateUser'); ?>

<?php $this->section('content'); ?>
<?php 
$idUser = session()->get('id');
if(session()->has('message')): ?>
    <div class="bg-green-700 text-white px-4 py-2 rounded-md mb-4">
        <?= session('message') ?>
    </div>
<?php endif; ?>

<div class="bg-white dark:bg-gray-900 min-h-screen py-8 px-16 lg:py-16 overflow-auto" style="margin-left: calc(-50vw + 50%); margin-right: calc(-50vw + 50%); width: 100vw;">
    <div class="mb-4 mt-[-40px] grid grid-cols-2 gap-x-4">
    <div class="mb-4">
        <?php if (!empty($dosen) && isset($dosen[0])): ?>
            <?php $namaDosen = urldecode($dosen[0]['nama']); ?>
            <?php $idDosen = urldecode($dosen[0]['id']); ?>
        <?php $nidn = urldecode($dosen[0]['nidn']); ?>
        
        <p class="">Nama Dosen : <?= $namaDosen; ?></p>
        <p class="">NIDN : <?= $nidn; ?></p>
        <?php else: ?>
            <p class="">Nama Dosen : Data dosen tidak tersedia.</p>
            <?php $idDosen = ''; // Atur id_dosen ke nilai default jika data dosen tidak tersedia ?>
        <?php endif; ?>
    </div>
        <div>
        <?php if (!empty($dosen) && isset($dosen[0])): ?>
            <?php $kelas = urldecode($dosen[0]['kelas']); ?>
            <?php $mk = urldecode($dosen[0]['mk']); ?>
            
            <p class="">Kelas : <?= $kelas; ?></p>
            <p class="">MK : <?= $mk; ?></p>
        <?php endif; ?>
    </div>
</div>
<div class="border-t border-black pt-4">
    <h1 class="text-3xl font-bold ">Jawab Pernyataan Berikut</h1>
    <p class="">Mohon diisi dengan benar dan dengan sejujur-jujurnya karena survey ini dibuat sebagai media penunjang untuk <br>meningkatkan kualitas belajar mengajar di Fakultas Vokasi Universitas Brawijaya.</p>
    <p class="font-bold">Skala 1-5</p>
    <p>Skala 1 = sangat tidak baik</p>
    <p>Skala 1 = sangat tidak baik</p>
    <p class="mb-4">Skala 1 dimulai dari kiri ke kanan</p>
    <p class="mb-8 font-bold">Selamat Mengerjakan !</p>
</div>
    <form action="/submitAnswer" method="post">
        <?= csrf_field() ?>
        <input type="hidden" value="<?= $idDosen; ?>" name="id_dosen">
        <input type="hidden" value="<?= $idUser; ?>" name="id_user">
        <h2 class="block mb-2 font-medium text-5 text-gray-900">Pernyataan</h2>
        <?php foreach ($pertanyaan as $index => $p) : ?>
            <div class="mb-6">
                <label for="pertanyaan<?= $index + 1 ?>" class="block text-5 mb-2"><?= $p['pertanyaan']; ?></label>
                <input type="hidden" name="id_pertanyaan[]" value="<?= $p['id'] ?>">
                <div class="flex items-center space-x-4">
                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                    <div class="flex items-center">
                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                            <input id="jawaban<?= $index + 1 ?>_<?= $i ?>" name="jawaban_<?= $index + 1 ?>" type="radio" value="<?= $i ?>" class="h-4 w-4 text-blue-600 border-black focus:ring-blue-500 <?= $i !== 1 ? 'ml-10' : '' ?>">
                        <?php endfor; ?>
                    </div>
                    <?php endfor ?>
                </div>
            </div>
        <?php endforeach ?>
    <h2 class="block mb-2 font-medium text-5 text-gray-900">Feedback</h2>
<div class="h-3"></div>
<label for="subject" class="block mb-2 text-sm font-medium text-gray-900">Subject</label>
<textarea name="subject" id="subject" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "></textarea>
<div class="h-3"></div>
<label for="feedback" class="block mb-2 text-sm font-medium text-gray-900">Feedback</label>
<textarea name="feedback" id="feedback" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "></textarea>
<div class="h-3"></div>

        
        <!-- Tombol Kirim -->
        <div class="flex justify-center">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded" onclick="return confirm('Are you sure you want to submit this survey?');">Kirim Jawaban</button>
        </div>
    </form>
</div>

<?php $this->endSection(); ?>