<?= $this->extend('layout/templateAdmin'); ?>

<?= $this->section('content'); ?>

<h1 class="text-9 font-bold mt-[40px] mb-10">Manajemen Feedback</h1>
<div class="w-full bg-blue-800">
    <div class="flex justify-end mt-4  p-4">
    <form action="/manajemen_feedback" method="GET" class="mb-4">
        <input type="text" name="keyword" class="p-2 border rounded" placeholder="Search" value="<?= isset($_GET['keyword']) ? $_GET['keyword'] : '' ?>">
         <button type="submit" class="p-2 bg-white text-white rounded">
            <svg class="w-6 h-6 text-black dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
            </svg>
        </button>
    </form>
     <a href="/manajemen_feedback" class="text-blue-500 hover:text-blue-700">
        <svg class=" w-8 h-8 text-white dark:text-white" style="margin-top: 8px;" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.651 7.65a7.131 7.131 0 0 0-12.68 3.15M18.001 4v4h-4m-7.652 8.35a7.13 7.13 0 0 0 12.68-3.15M6 20v-4h4"/>
        </svg>

    </a>
    </div>
    <?php if (session()->getFlashdata('pesan')) : ?>
    <!-- Tambahkan bagian pesan jika diperlukan -->
    <?php endif; ?>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-sm text-black uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class=" text-black truncate max-w-[100px] text-center">Nama Dosen</th>
                    <th scope="col" class=" text-black truncate max-w-[100px] text-center">NIDN</th>
                    <th scope="col" class=" text-black truncate max-w-[100px] text-center">Subject</th>
                    <th scope="col" class=" text-black truncate max-w-[100px] text-center">Feedback</th>
                    <th scope="col" class="px-6 py-3 mr-19 text-center font-bold">
                    Aksi
                </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($feedbacks as $feedback) : ?>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class=" text-black truncate max-w-[100px] text-center"><?= esc($feedback['nama']) ?></td>
                    <td class=" text-black truncate max-w-[100px] text-center"><?= esc($feedback['nidn']) ?></td>
                    <td class=" text-black truncate max-w-[100px] text-center"><?= esc($feedback['subject']) ?></td>
                    <td class=" text-black truncate max-w-[100px] text-center"><?= esc($feedback['feedback']) ?></td>
                                        <td class="px-6 py-4">
                        <div class="flex justify-center">
                            <div class="flex justify-center">
                            <a class="mr-2" href="/manajemen_feedback/view_feedback/<?= $feedback['id_fb']; ?>">
                                <svg class="w-6 h-6 text-black dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                </svg>


                            </a>
                            <a class="mr-2" href="/manajemen_feedback/delete_feedback/<?= $feedback['id_fb']; ?>" onclick="return confirm('Are you sure you want to delete this feedback?');">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </a>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection(); ?>
