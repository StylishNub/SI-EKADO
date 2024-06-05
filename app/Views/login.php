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
    <style>
      body {
        background-image: url("/img/foto4.jpg");
        background-size: cover;
        background-position: center;
        
      }
    </style>

</head>

<body class=" flex items-center h-full">
    <div class="flex flex-row-reverse">  
        <div class="h-screen px-16 absolute left-[350px] bg-[#110F36] transform -skew-x-6 overflow-hidden "></div>
 <div class="w-full h-screen px-16 pr-4 bg-[#110F36] transform  overflow-hidden">
 <h1 class="text-center text-8 font-bold text-white mt-4">SI<span class="text-[#FFBE1A]">EKADO</h1> 
    <?php
    echo form_open('auth/cek_login');
    ?>
    <div class="">
        <br>
        <p class="text-white mt-10 text-center font-poppins">Selamat datang di Sistem Informasi Evaluasi <br> Kinerja Dosen  Melalui Survey Kepuasan</p>
                    <?php
                    $errors = session()->getFlashdata('errorslogin');
                    if ($errors !== null && is_array($errors)) :
                    ?>
                        <div class="alert flex p-4 mb-4 text-sm text-red-800 bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Danger</span>
                            <div>
                                <span class="font-medium">Terdapat beberapa hal yang perlu anda perhatikan:</span>
                                <ul class="mt-1.5 list-disc list-inside">
                                    <?php foreach ($errors as $error) : ?>
                                        <li class=""><?= esc($error) ?></li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php
                    if (session()->getFlashdata('pesanlogin')) {
                        echo '<div class="alert flex p-4 mb-4 text-sm text-red-800 bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">';
                        echo '<svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">';
                        echo '<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>';
                        echo '<span class="sr-only">Danger</span>';
                        echo '<div>';
                        echo '<span class="font-medium">';
                        echo session()->getFlashdata('pesanlogin');
                        echo '</span>';
                        echo '</div>';
                        echo '</div>';
                    } ?>
                    <?php if (session()->has('pesan')) : ?>
                        <div class="alert alert-success flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium"><?= session()->get('pesan') ?></span>
                            </div>
                        </div>
                    <?php endif ?>
                    <div class="modal-body">
                        <br>
                        <div class="mt-12 ">
                            <label for="email" class="font-poppins text-5 text-white">Email</label>
                            <input type="text" name="email" class="w-full px-3 py-2 border rounded-lg">
                        </div>
                        <div class="mt-7">
                            <label for="password" class=" text-5 -mt-40 text-white">password</label>
                            <input type="password" name="password" class="font-poppins w-full px-3 py-2 border rounded-lg">
                        </div>
                        <div class="flex flex-col justify-center items-center gap-2 mt-7">
                            <button class="font-bold bg-white text-black font-mono px-4 py-2 rounded-lg hover:bg-blue-600">Login</button>
                        </div>
                        <div class="mt-12">
                            <h3 class="text-white font-poppins"></h3>
                            <p class="text-white font-poppins "></p>
                        </div>
                    </div>
                </div>
                <?php echo form_close() ?>
            </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 3000);
    </script>
</body>

</html>