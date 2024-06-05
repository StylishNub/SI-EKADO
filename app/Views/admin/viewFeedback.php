<?php $this->extend('layout/templateAdmin'); ?>

<?php $this->section('content'); ?>
<br>
<br>
<a href="/manajemen_feedback"><svg class="w-6 h-6 text-black dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7"/>
</svg></a>



<h1 class="text-9 font-bold" style="margin-top: 40px;">View Feedback</h1>

<form action="/view_feedback" method="post" class="w-180" enctype="multipart/form-data">
    <input type="hidden" name="id_feedback" id="id_feedback" class="" value="<?= esc($feedback['id_fb']); ?>">

    <div class="h-3"></div>
    <p class=" block w-full ">Nama : <?= esc($feedback['nama']); ?></p>
    <div class="h-3"></div>
    <p class=" block w-full ">NIDN: <?= esc($feedback['nidn']); ?></p>
    <div class="h-3"></div>
    <div class="h-3"></div>
    <div class="border-t border-black pt-2">
    <div class="h-3"></div>
    <label for="subject" class="block mb-2 text-sm font-medium text-gray-900">Subjek:</label>
    <textarea name="subject" id="subject" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "><?= esc($feedback['subject']); ?></textarea>
    <div class="h-3"></div>
    <label for="feedback" class="block mb-2 text-sm font-medium text-gray-900">Feedback:</label>
    <textarea name="feedback" id="feedback" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "><?= esc($feedback['feedback']); ?></textarea>
    <div class="h-3"></div>
</form>

<?php $this->endSection(); ?>