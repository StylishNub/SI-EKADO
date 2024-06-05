<?php $this->extend('layout/templateAdmin'); ?>

<?php $this->section('content'); ?>

 <div class="flex flex-wrap mt-[60px] gap-4 justify-center">
            <div class="flex-shrink-0 w-full sm:w-1/2 md:w-1/2 lg:flex-1 xl:w-1/2 2xl:w-[230px] p-4 bg-red-400 rounded-lg mb-4">
                <div class="text-xl font-extrabold mb-2">User</div>
                <div class="text-4xl"><?php echo $getUser?></div>
            </div>
            <div class="flex-shrink-0 w-full sm:w-1/2 md:w-1/2 lg:flex-1 xl:w-1/2 2xl:w-[230px] p-4 bg-yellow-400 rounded-lg mb-4">
                <div class="text-xl font-extrabold mb-2">Dosen</div>
                <div class="text-4xl"><?php echo $getDosen?></div>
            </div>
            <div class="flex-shrink-0 w-full sm:w-1/2 md:w-1/2 lg:flex-1 xl:w-1/2 2xl:w-[230px] p-4 bg-green-400 rounded-lg mb-4">
                <div class="text-xl font-extrabold mb-2">Kelas</div>
                <div class="text-4xl"><?php echo $getCount?></div>
            </div>
            <div class="flex-shrink-0 w-full sm:w-1/2 md:w-1/2 lg:flex-1 xl:w-1/2 2xl:w-[230px] p-4 bg-gray-400 rounded-lg mb-4">
                <div class="text-xl font-extrabold mb-2">Mata Kuliah</div>
                <div class="text-4xl"><?php echo $getMatkul?></div>
            </div>

<?php $this->endSection(); ?>