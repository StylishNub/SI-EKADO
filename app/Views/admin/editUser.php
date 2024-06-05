<?php $this->extend('layout/templateAdmin'); ?>

<?php $this->section('content'); ?>
<br>
<br>
<a href="/manajemen_user"><svg class="w-6 h-6 text-black dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7"/>
</svg></a>

<h1 class="text-9 font-bold" style="margin-top: 40px;">Edit User</h1>

<form action="/edit_user/save_edit_user" method="post" class="w-180" enctype="multipart/form-data">
    <input type="hidden" name="id_user" id="id_user" class="" value="<?= $user['id']; ?>">
    <input type="hidden" name="gambarLama" value="<?= $user['gambar']; ?>">
    <label class="custom-file-label hidden mb-2 text-sm font-medium text-gray-900 dark:text-white" id="customFileLabel" for="gambar"><?= $user['gambar']; ?></label>
    <label class="block mb-2 text-sm font-medium text-gray-900" for="gambar">Gambar:</label>
    <div>
        <img src="/img/<?= $user['gambar']; ?>" class="img-preview w-36">
    </div>
    <input onchange="previewImg()" value="<?= $user['gambar']; ?>" class="custom-file-input block w-full text-sm text-gray-900 border border-gray-300 rounded-sm cursor-pointer bg-gray-50" id="gambar" name="gambar" type="file">
    <div class="h-3"></div>
    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama:</label>
    <textarea name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "><?= $user['name']; ?></textarea>
    <div class="h-3"></div>
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
    <textarea name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "><?= $user['email']; ?></textarea>
    <div class="h-3"></div>
    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
    <textarea name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "><?= $user['password']; ?></textarea>
    <div class="h-3"></div>
    <label for="level" class="block mb-2 text-sm font-medium text-gray-900">Level</label>
    <textarea name="level" id="level" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "><?= $user['level']; ?></textarea>
    <div class="h-3"></div>
    <label for="kelas" class="block mb-2 text-sm font-medium text-gray-900">Kelas</label>
    <textarea name="kelas" id="kelas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "><?= $user['kelas']; ?></textarea>
    <div class="h-3"></div>
    <button onclick="changeFileValue()" type="submit" class="py-2.5 px-5 bg-carrot-1 hover:bg-carrot-3 font-medium text-xs rounded-1 text-white transition duration-200 ease-in-out">Simpan</button>
</form>

<?php $this->endSection(); ?>