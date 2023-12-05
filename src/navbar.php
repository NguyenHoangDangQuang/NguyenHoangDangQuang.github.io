<link href="../output.css" rel="stylesheet">

<main class="font-sans">

    <div
        class=' bg-white py-4 px-4 md:px-0 border border-l-black  animate-fade-down animate-duration-1000 animate-delay-700 animate-ease-out'>
        <div class='max-w-7xl mx-auto flex justify-between items-center '>
            <a href="" class='flex items-center'>
                <img src='./images/logo.png' alt='Logo' class=' px-4 h-8 sm:h-10 md:h-10 lg:h-12 xl:h-20 ' />
                <h1
                    class="hidden  md:flex text-left font-vnpro italic font-bold text-red-500 drop-shadow-[0_1.2px_1.2px_rgba(0,0,0,0.5)]">
                    THỂ THAO
                    NHA TRANG</h1>

            </a>

            <div class='hidden md:flex'>
                <ul class='flex items-center space-x-4'>
                    <a href="#home">Về trang chủ</a>
                    <a href="#khoahoc">Khoá học</a>

                    <a href=""></a>
                    <a href=""></a>
                </ul>
            </div>

            <div class='flex items-center space-x-4'>
                <button
                    class='hidden md:block border border-gray-300 px-4 py-2 rounded-md hover:font-bold'>Login</button>
                <a href="#get_started"
                    class='hidden md:block bg-red-500 text-white px-4 py-2 rounded-md hover:font-bold'>Đăng
                    ký</a>
                <div class='md:hidden'>
                    <img src='./images/hamburgerMenu.svg' alt='Menu' class='h-6 w-6 cursor-pointer' id='hamburger-menu'>
                </div>
            </div>
        </div>
    </div>

    <div class='mobile-menu-overlay hidden bg-white md:hidden'>
        <ul class='py-4 px-4 space-y-4'>
            <li>Home</li>
            <li>Khoá học</li>
            <li>Liên hệ</li>
            <li>Về chúng tôi</li>
            <li>
                <button
                    class='border border-gray-300 px-4 py-2 rounded-md w-full text-center hover:underline hover:font-bold '>Login</button>
            </li>
            <li>
                <button class='bg-green-500 text-white px-4 py-2 rounded-md w-full hover:font-bold'>Sign in</button>
            </li>
        </ul>
    </div>

    <script src=" ./javascript/menu.js"></script>
</main>