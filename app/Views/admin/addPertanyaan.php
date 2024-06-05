<?php $this->extend('layout/templateAdmin'); ?>

<?php $this->section('content'); ?>
<br>
<br>
<a href="/manajemen_pertanyaan"><svg class="w-6 h-6 text-black dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7"/>
</svg></a>

<h1 class="text-9 font-bold mt-[40px] mb-10">Tambah Pertanyaan</h1>

<?php
$errors = session()->getFlashdata('errors');
if ($errors !== null && is_array($errors)) :
?>
    <div class="alert flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Danger</span>
        <div>
            <span class="font-medium">Terdapat beberapa error:</span>
            <ul class="mt-1.5 list-disc list-inside">
                <?php foreach ($errors as $error) : ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
<?php endif; ?>

<form action="/tambah_pertanyaan/save_pertanyaan" method="post" class="w-full p-6 rounded-lg">
    <?= csrf_field() ?>
    <div class="mb-4">
        <label for="pertanyaan" class="block mb-2 text-sm font-medium text-gray-900">Pertanyaan:</label>
        <input type="text" name="pertanyaan" id="pertanyaan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?= old('pertanyaan') ?>" required>
    </div>
    <button type="submit" class="py-2.5 px-5 bg-green-400 hover:bg-white text-black rounded-1 font-montserrat font-medium transition duration-200 ease-in-out">Simpan</button>
</form>

<?php $this->endSection(); ?>
