<?php $this->extend('layout/templateUser'); ?>

<?php $this->section('content'); ?>
<div class="bg-[rgb(17,15,54)] dark:bg-gray-900 h-screen py-8 px-16 lg:py-16" style="margin-left: calc(-50vw + 50%); margin-right: calc(-50vw + 50%); width: 100vw;">
<?php 
$idUser = session()->get('id');
if(session()->has('message')): ?>
    <div id="flash-message" class="bg-green-500 text-white px-4 py-2 rounded-md mb-4">
        <?= session('message') ?>
    </div>
        <style>
        @keyframes swipeUpAnimation {
            0% {
                transform: translateY(0);
            }
            100% {
                transform: translateY(-100%);
                opacity: 0;
            }
        }

        #flash-errors {
            animation: swipeUpAnimation 5s forwards;
        }
    </style>
<?php endif; ?>
<?php 
$idUser = session()->get('id');
if(session()->has('errors')): ?>
    <div id="flash-errors" class="bg-red-700 text-white px-4 py-2 rounded-md mb-4">
        <?= session('errors') ?>
    </div>
    <style>
        @keyframes swipeUpAnimation {
            0% {
                transform: translateY(0);
            }
            100% {
                transform: translateY(-100%);
                opacity: 0;
            }
        }

        #flash-errors {
            animation: swipeUpAnimation 5s forwards;
        }
    </style>
<?php endif; ?>
<br>
        <div class="text-2xl text-yellow-500 font-bold mt-[-30px] mb-6">SURVEY KEPUASAN</div>
    <div class="bg-white p-4 border border-black rounded-md">
        <div class="flex justify-between">
        <div class="flex items-center space-x-2 ml-auto">
            <form action="/survey" method="GET">
                <input type="text" class="p-2 rounded-md border border-black" placeholder="Search" name="keyword" value="<?= isset($_GET['keyword']) ? $_GET['keyword'] : '' ?>"/>
                <button type="submit" class="p-2 bg-black text-white rounded">
                    <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
            </svg>
                </button>
            </form>
        </div>
            <a href="/survey" class="text-blue-500 hover:text-blue-700">
        <svg class=" w-8 h-8 text-black dark:text-white" style="margin-top: 8px;" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.651 7.65a7.131 7.131 0 0 0-12.68 3.15M18.001 4v4h-4m-7.652 8.35a7.13 7.13 0 0 0 12.68-3.15M6 20v-4h4"/>
        </svg>
    </a>
        </div>

        <table class="w-full text-left border mt-4 mb-4 border-black">
            <thead class="text-sm text-black bg-white border-black">
                <tr>
                    <th class="border border-black px-6 py-3 font-bold">
                        No
                    </th>
                    <th class="border border-black px-6 py-3 font-bold">
                        Nama Dosen
                    </th>
                    <th class="border border-black px-6 py-3 font-bold">
                        NIDN
                    </th>
                    <th class="border border-black px-6 py-3 font-bold">
                        Kelas
                    </th>
                    <th class="border border-black px-6 py-3 font-bold">
                        Mata Kuliah
                    </th>
                    <th class="border border-black px-6 py-3 mr-19 text-center font-bold">
                        Aksi
                    </th>
                </tr>
            </thead>
            
            <tbody class="divide-y divide-white border border-black">
                <?php $no = 1; ?>
                <?php foreach ($dosen as $a) : ?>
                    <tr class="border-b border-black">
                        <td class="px-6 py-4 font-medium text-black border border-black truncate max-w-[100px]">
                            <?= $no++; ?>
                        </td>
                        <td class="px-6 py-4 font-medium text-black border border-black truncate max-w-[100px]">
                            <?= $a['nama']; ?>
                        </td>
                        <td class="px-6 py-4 font-medium text-black border border-black truncate max-w-[100px]">
                            <?= $a['nidn']; ?>
                        </td>
                        <td class="px-6 py-4 font-medium text-black border border-black truncate max-w-[100px]">
                            <?= $a['kelas']; ?>
                        </td>
                        <td class="px-6 py-4 font-medium text-black border border-black truncate max-w-[100px]">
                            <?= $a['mk']; ?>
                        </td>
                        <td class="px-6 py-4 border border-black">
                            <div class="flex justify-center">
                                <div class="flex justify-center">
                                    <a class="mr-2" href="/detail_survey/<?= urlencode($a['nama']); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-blue-600">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </a>    
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    
    <!-- Table Footer -->
</div>
</div>
    <script>
        // Auto dismiss flash message after 3 seconds
        setTimeout(function() {
            var flashMessage = document.getElementById('flash-message');
            if (flashMessage) {
                flashMessage.style.display = 'none';
            }
        }, 3000);
    </script>
        <script>
        // Auto dismiss flash message after 3 seconds
        setTimeout(function() {
            var flashMessage = document.getElementById('flash-errors');
            if (flashMessage) {
                flashMessage.style.display = 'none';
            }
        }, 3000);
    </script>

<?php $this->endSection(); ?>

