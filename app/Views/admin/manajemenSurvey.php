<?= $this->extend('layout/templateAdmin'); ?>

<?= $this->section('content'); ?>

<h1 class="text-9 font-bold mt-[40px] mb-10">Manajemen Survey</h1>
<div class="w-full bg-blue-800">
    <div class="flex justify-end mt-4  p-4">
    <form action="/surveyResults" method="GET" class="mb-4">
        <input type="text" name="keyword" class="p-2 border rounded" placeholder="Search" value="<?= isset($_GET['keyword']) ? $_GET['keyword'] : '' ?>">
         <button type="submit" class="p-2 bg-white text-white rounded">
            <svg class="w-6 h-6 text-black dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
            </svg>
        </button>
    </form>
     <a href="/surveyResults" class="text-blue-500 hover:text-blue-700">
        <svg class=" w-8 h-8 text-white dark:text-white" style="margin-top: 8px;" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.651 7.65a7.131 7.131 0 0 0-12.68 3.15M18.001 4v4h-4m-7.652 8.35a7.13 7.13 0 0 0 12.68-3.15M6 20v-4h4"/>
        </svg>
    </a>
    </div>
    <?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div><?= session()->getFlashdata('pesan') ?></div>
    </div>
    <?php endif; ?>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-sm text-black uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                
                <tr>
                     <th scope="col" class="px-6 py-4  text-black truncate max-w-[100px] text-center">No</th>
                    <th scope="col" class="px-6 py-4  text-black truncate max-w-[100px] text-center">Nama Dosen</th>
                    <th scope="col" class="px-6 py-4  text-black truncate max-w-[100px] text-center">NIDN</th>
                    <th scope="col" class="px-6 py-4  text-black truncate max-w-[100px] text-center">Kelas</th>
                    <th scope="col" class="px-6 py-4  text-black truncate max-w-[100px] text-center">IPD</th>
                </tr>
            </thead>
                <tbody>
                    <?php $no = 1; // Pindahkan inisialisasi di sini ?>
                    <?php foreach ($dosen as $d) : ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4 font-medium text-black truncate max-w-[100px] text-center">
                            <?= $no++; ?>
                        </td>
                        <td class="px-6 py-4 font-medium text-black truncate max-w-[100px] text-center"><?= esc($d['nama_dosen']) ?></td>
                        <td class="px-6 py-4 font-medium text-black truncate max-w-[100px] text-center"><?= esc($d['nidn']) ?></td>
                        <td class="px-6 py-4font-medium text-black truncate max-w-[100px] text-center"><?= esc($d['kelas']) ?></td>
                        <td class="px-6 py-4 font-medium text-black truncate max-w-[100px] text-center"><?= number_format($d['average_ipd'], 2) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
        </table>
    </div>
</div>

<?= $this->endSection(); ?>

