<?php $this->extend('layout/templateAdmin'); ?>

<?php $this->section('content'); ?>
<br>
<br>
<a href="/manajemen_dosen"><svg class="w-6 h-6 text-black dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7"/>
</svg></a>

<h1 class="text-9 font-bold mb-20">Edit dosen</h1>

<form action="/edit_dosen/save_edit" method="post" class="w-180" enctype="multipart/form-data">
    <input type="hidden" name="id_dosen" id="id_dosen" class="" value="<?= $dosen['id']; ?>">
    <input type="hidden" name="gambarLama" value="<?= $dosen['gambar']; ?>">
    <label class="custom-file-label hidden mb-2 text-sm font-medium text-gray-900 dark:text-white" id="customFileLabel" for="gambar"><?= $dosen['gambar']; ?></label>
    <label class="block mb-2 text-sm font-medium text-gray-900" for="gambar">Gambar:</label>
    <div>
        <img src="/img/<?= $dosen['gambar']; ?>" class="img-preview w-36">
    </div>
    <input onchange="previewImg()" value="<?= $dosen['gambar']; ?>" class="custom-file-input block w-full text-sm text-gray-900 border border-gray-300 rounded-sm cursor-pointer bg-gray-50" id="gambar" name="gambar" type="file">
    <div class="h-3"></div>
    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Nama:</label>
    <input type="text" name="nama" id="nama" value="<?= $dosen['nama']; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
    <div class="h-3"></div>
    <label for="nidn" class="block mb-2 text-sm font-medium text-gray-900">NIDN:</label>
    <textarea name="nidn" id="nidn" rows="10" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "><?= $dosen['nidn']; ?></textarea>
    <div class="h-3"></div>
    <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi:</label>
    <textarea name="deskripsi" id="deskripsi" rows="10" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "><?= $dosen['deskripsi']; ?></textarea>
    <div class="h-3"></div>
    <label for="kelas" class="block mb-2 text-sm font-medium text-gray-900">Kelas:</label>
    <textarea name="kelas" id="kelas" rows="10" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "><?= $dosen['kelas']; ?></textarea>
    <div class="h-3"></div>
    <label for="mk" class="block mb-2 text-sm font-medium text-gray-900">Mata Kuliah:</label>
    <textarea name="mk" id="mk" rows="10" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "><?= $dosen['mk']; ?></textarea>
    <div class="h-3"></div>
    <button onclick="changeFileValue()" type="submit" class="py-2.5 px-5 bg-carrot-1 hover:bg-carrot-3 font-medium text-xs rounded-1 text-white transition duration-200 ease-in-out">Simpan</button>
</form>

<?php $this->endSection(); ?>