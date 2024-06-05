<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Actor&family=Alegreya:ital,wght@0,400..900;1,400..900&family=Aleo:ital,wght@0,100..900;1,100..900&family=Gowun+Batang&family=Gravitas+One&family=Katibeh&family=Marcellus&family=Purple+Purse&family=Quattrocento:wght@400;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Sree+Krushnadevaraya&display=swap" rel="stylesheet">
    <title><?= $title; ?></title>
    <link href="<?= base_url() ?>css/style.css" rel="stylesheet" />
</head>

<body class="antialiased leading-default bg-[#F6F6F6] text-black">
    <div class="absolute w-full min-h-75"></div>
<nav class="fixed top-0 z-50 w-full bg-[#110F36] border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
  <div class="px-3 py-3 lg:px-5 lg:pl-3">
    <div class="flex items-center justify-between">
      <div class="flex items-center justify-start rtl:justify-end">
        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-white focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
               <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
            </svg>
         </button>
        <h1 class="font-bold text-white text-5 mb-2 ml-4">SI<span class="text-[#FFBE1A]">EKADO</span></h1>
      </div>
      <div class="flex items-center">
          <div class="flex items-center ms-3">
            <div>
              <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                <span class="sr-only">Open user menu</span>
               
              </button>
            </div>
          </div>
        </div>
    </div>
  </div>
</nav>

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-[#110F36] border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
   <div class="h-full px-3 pb-4 overflow-y-auto bg-[#110F36] dark:bg-gray-800">
      <ul class="space-y-2 font-medium">
         <li>
            <a class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#FFBE1A] dark:hover:bg-gray-700 group
            <?= $menu == 'dashboard' ? 'bg-[#FFBE1A]' : '' ?> <?= $menu == 'dashboard' ? 'font-bold' : '' ?> <?= $menu == 'dashboard' ? 'text-black' : '' ?> " href="<?= base_url('dashboard') ?>">
               <svg class="w-5 h-5 text-white transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                  <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                  <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
               </svg>
               <span class="ms-3 text-white">Dashboard</span>
            </a>
         </li>
         <li>
            <a class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#FFBE1A] dark:hover:bg-gray-700 group
            <?= $menu == 'user' ? 'bg-[#FFBE1A]' : '' ?> <?= $menu == 'user' ? 'font-bold' : '' ?> <?= $menu == 'user' ? 'text-black' : '' ?>" href="<?= base_url('manajemen_user') ?>">
                <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-width="2" d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                </svg>

               <span class="flex-1 ms-3 whitespace-nowrap text-white">User</span>
            </a>
         </li>
         <li>
            <a class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#FFBE1A] dark:hover:bg-gray-700 group
            <?= $menu == 'manajemen' ? 'bg-[#FFBE1A]' : '' ?> <?= $menu == 'manajemen' ? 'font-bold' : '' ?> <?= $menu == 'manajemen' ? 'text-black' : '' ?>" href="<?= base_url('manajemen_dosen') ?>">
                <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M4.5 17H4a1 1 0 0 1-1-1 3 3 0 0 1 3-3h1m0-3.05A2.5 2.5 0 1 1 9 5.5M19.5 17h.5a1 1 0 0 0 1-1 3 3 0 0 0-3-3h-1m0-3.05a2.5 2.5 0 1 0-2-4.45m.5 13.5h-7a1 1 0 0 1-1-1 3 3 0 0 1 3-3h3a3 3 0 0 1 3 3 1 1 0 0 1-1 1Zm-1-9.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"/>
                </svg>

               <span class="flex-1 ms-3 whitespace-nowrap text-white">Dosen</span>
            </a>
         </li>
         <li>
            <a class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#FFBE1A] dark:hover:bg-gray-700 group 
             <?= $menu == 'pertanyaan' ? 'bg-[#FFBE1A]' : '' ?> <?= $menu == 'pertanyaan' ? 'font-bold' : '' ?> <?= $menu == 'pertanyaan' ? 'text-black' : '' ?>" href="<?= base_url('manajemen_pertanyaan') ?>">
               <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-6 5h6m-6 4h6M10 3v4h4V3h-4Z"/>
                </svg>

               <span class="flex-1 ms-3 whitespace-nowrap text-white">Pertanyaan</span>
            </a>
         </li>
         <li>
           <a class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#FFBE1A] dark:hover:bg-gray-700 group 
             <?= $menu == 'hasil' ? 'bg-[#FFBE1A]' : 'hasil' ?> <?= $menu == 'hasil' ? 'font-bold' : '' ?> <?= $menu == 'hasil' ? 'text-black' : '' ?>" href="<?= base_url('surveyResults') ?>">
                <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-6 7 2 2 4-4m-5-9v4h4V3h-4Z"/>
                </svg>

               <span class="flex-1 ms-3 whitespace-nowrap text-white">hasil Survey</span>
            </a>
         </li>
         <li>
            <a class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#FFBE1A] dark:hover:bg-gray-700 group 
             <?= $menu == 'feedback' ? 'bg-[#FFBE1A]' : 'feedback' ?> <?= $menu == 'feedback' ? 'font-bold' : '' ?> <?= $menu == 'feedback' ? 'text-black' : '' ?>" href="<?= base_url('manajemen_feedback') ?>">
            <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17h6l3 3v-3h2V9h-2M4 4h11v8H9l-3 3v-3H4V4Z"/>
            </svg>

               <span class="flex-1 ms-3 whitespace-nowrap text-white">Feedback</span>
            </a>
         </li>
         <li>
            <a class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#FFBE1A] dark:hover:bg-gray-700 group" href="<?= base_url('logout') ?>">
               <svg class="flex-shrink-0 w-5 h-5 text-white transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
               </svg>
               <span class="flex-1 ms-3 whitespace-nowrap text-white">Keluar</span>
            </a>
         </li>
      </ul>
   </div>
</aside>
    <!-- sidenav  -->
    <!-- <aside class="fixed bg-carrot-2 inset-y-0 flex-wrap items-center justify-between block w-full p-0 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full border-0 shadow-2xl  max-w-64 ease-nav-brand z-990  xl:left-0 xl:translate-x-0" aria-expanded="false">
        <div class="h-19">
            <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times  text-slate-400 xl:hidden" sidenav-close></i>
            <a class="flex justify-center items-center px-8 py-6 m-0 text-sm whitespace-nowrap  text-black" href="#">
                <span class="ml-1 font-katibeh transition-all text-9 duration-200 ease-nav-brand">CALMHEALTH</span>
            </a>
        </div>
        <hr class="h-1 mt-0 bg-white" />
        <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
            <ul class="flex flex-col pl-0 font-gowun-batang gap-2 mb-0">
                <li class="mt-0.5 w-full">
                    <a class="py-2.7  text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap transition-colors hover:bg-white  
                    <?= $menu == 'dashboard' ? 'bg-white' : '' ?> <?= $menu == 'dashboard' ? 'font-bold' : '' ?> <?= $menu == 'dashboard' ? 'text-black' : '' ?> " href="<?= base_url('dashboard') ?>">
                        <div class="mr-2 flex h-8 w-8 items-center justify-center bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-tv-2"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 text-5 pointer-events-none ease">Dashboard</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap transition-colors hover:bg-white
                    <?= $menu == 'manajemen' ? 'bg-white' : '' ?> <?= $menu == 'manajemen' ? 'font-bold' : '' ?> <?= $menu == 'manajemen' ? 'text-black' : '' ?>" href="<?= base_url('manajemen_dosen') ?>">
                        <div class="mr-2 flex h-8 w-8 items-center justify-center bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-calendar-grid-58"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 text-5 pointer-events-none ease">Manajemen Artikel</span>
                    </a>
                </li>

                <li class="absolute bottom-2 mt-0.5 w-full font-gowun-batang bg-carrot-2">
                    <a class="py-2.7  text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap  transition-colors hover:bg-white hover" href="<?= base_url('logout') ?>">
                        <div class="flex h-8 w-8 items-center justify-center bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-red-600 ni ni-world-2"></i>
                        </div>
                        <span class=" flex items-center text-5 font-bold duration-300 opacity-100 pointer-events-none ease">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                            </svg>
                            Keluar</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside> -->

    <!-- end sidenav -->

    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
        <div class="w-full px-10 py-6 mx-auto">
            <?php $this->renderSection('content'); ?>
        </div>
    </main>
</body>
<!-- main script file  -->
<script src="<?= base_url() ?>js/main.js"></script>
<script>

function previewImg(){
    const gambar = document.querySelector('#gambar');
    const gambarLabel = document.querySelector('label[for="gambar"]');
    const imgPreview = document.querySelector('.img-preview');

    gambarLabel.textContent = gambar.files[0].name;

    const fileGambar = new FileReader();
    fileGambar.readAsDataURL(gambar.files[0]);

    fileGambar.onload = function(e){
        imgPreview.src = e.target.result;
    }
}

</script>

</html>