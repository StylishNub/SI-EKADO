<?php $this->extend('layout/templateAdmin'); ?>

<?php $this->section('content'); ?>
<br>
<br>
<a href="/manajemen_pertanyaan"><svg class="w-6 h-6 text-black dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7"/>
</svg></a>

<h1 class="text-9 font-bold" style="margin-top: 40px;">Edit Pertanyaan</h1>

<form action="/edit_pertanyaan/save_edit_pertanyaan" method="post" class="w-180" enctype="multipart/form-data">
    <input type="hidden" name="id_pertanyaan" id="id_pertanyaan" class="" value="<?= $pertanyaan['id']; ?>">

    <div class="h-3"></div>
    <label for="pertanyaan" class="block mb-2 text-sm font-medium text-gray-900">Pertanyaan:</label>
 <textarea name="pertanyaan" id="pertanyaan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "><?= $pertanyaan['pertanyaan']; ?></textarea>
    <div class="h-3"></div>
    <button onclick="changeFileValue()" type="submit" class="py-2.5 px-5 bg-carrot-1 hover:bg-carrot-3 font-medium text-xs rounded-1 text-white transition duration-200 ease-in-out">Simpan</button>
</form>

<?php $this->endSection(); ?>