<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rokkitt:ital,wght@0,100..900;1,100..900&family=Abril+Fatface&family=Actor&family=Alegreya:ital,wght@0,400..900;1,400..900&family=Aleo:ital,wght@0,100..900;1,100..900&family=Gowun+Batang&family=Gravitas+One&family=Katibeh&family=Marcellus&family=Purple+Purse&family=Quattrocento:wght@400;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Sree+Krushnadevaraya&display=swap" rel="stylesheet">
    <title><?= $title; ?></title>
    <link href="<?= base_url() ?>css/style.css" rel="stylesheet" />
    <script>
        <?php if (session()->getFlashdata('error')) : ?>
            window.addEventListener('DOMContentLoaded', () => {
                document.getElementById('myModal1').classList.remove('hidden');
            });
        <?php endif; ?>
    </script>
    <style>
        /* Style for the dropdown menu */
        .dropdown-menu {
            display: none;
            position: absolute;
            top: 50px;
            right: 0;
            background-color: white;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-menu a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-menu a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .dropdown img {
            cursor: pointer;
        }
    </style>
</head>

<body class="antialiased font-normal leading-default bg-[#F6F6F6] text-black">
    <!-- navbar -->
    <nav class="bg-[#110F36] flex w-full h-16 px-10 justify-between items-center" style="margin-left: calc(-50vw + 50%); margin-right: calc(-50vw + 50%); width: 100vw;">
        <h1 class="font-bold text-white text-7 mb-2">SI<span class="text-[#FFBE1A]">EKADO</span></h1>
        <div class="flex gap-12 text-4 font-bold">
            <a href="/home" class="border-b-2 text-white hover:border-[#FFBE1A] <?= $menu == 'home' ? 'border-[#FFBE1A]' : 'border-transparent' ?>">Home</a>
            <a href="/dosen" class="border-b-2 text-white hover:border-[#FFBE1A] <?= $menu == 'dosen' ? 'border-[#FFBE1A]' : 'border-transparent' ?>">Dosen</a>
            <a href="/survey" class="border-b-2 text-white hover:border-[#FFBE1A] <?= $menu == 'survey' ? 'border-[#FFBE1A]' : 'border-transparent' ?>">Survey</a>
            <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <div class="dropdown" style="margin-left: 15px;">
                    <img class="w-8 h-8 rounded-full" src="/img/wow.jpeg" alt="user photo" id="user-menu-button">
                    <div class="dropdown-menu" id="user-dropdown">
                        <ul class="py-2" aria-labelledby="user-menu-button">
                            <li>
                                <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Profile</a>
                            </li>                       
                            <li>
                                <a href="<?= base_url('logout') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- main -->
    <main class="px-10">
        <?php $this->renderSection('content'); ?>
    </main>
    <script>
        // JavaScript to handle dropdown functionality
        document.addEventListener('DOMContentLoaded', function () {
            const userMenuButton = document.getElementById('user-menu-button');
            const userDropdown = document.getElementById('user-dropdown');

            userMenuButton.addEventListener('click', function (event) {
                event.stopPropagation();
                userDropdown.classList.toggle('hidden');
            });

            document.addEventListener('click', function () {
                userDropdown.classList.add('hidden');
            });
        });
    </script>
</body>

</html>
