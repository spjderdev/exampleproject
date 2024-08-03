<span class="absolute text-white text-4xl top-5 left-4 cursor-pointer" onclick="openSidebar()">
    <i class="bi bi-filter-left px-2 bg-gray-900 rounded-md"></i>
</span>
<div class="sidebar fixed top-0 bottom-0 lg:left-0 p-4 w-[300px] overflow-y-auto bg-gray-800 shadow-lg text-center transition-transform transform -translate-x-full lg:translate-x-0">
    <div class="flex items-center justify-between p-4">
        <img src="./public/images/logo.png" class="w-8 h-8" alt="Logo">
        <h1 class="font-bold text-gray-200 text-lg">BuonHayZui</h1>
        <i class="bi bi-x cursor-pointer lg:hidden" onclick="openSidebar()"></i>
    </div>
    <div class="my-2 bg-gray-600 h-[1px]"></div>

    <nav class="mt-6">
        <a href="index.php?controller=pages&action=home" class="flex items-center p-3 rounded-md text-gray-200 hover:bg-red-600 transition-colors">
            <i class="bi bi-house-door-fill"></i>
            <span class="ml-3 font-semibold">Home</span>
        </a>
        <div class="relative">
            <div class="flex items-center justify-between p-3 rounded-md text-gray-200 hover:bg-red-600 transition-colors cursor-pointer" onclick="toggleDropdown('category')">
                <div class="flex items-center">
                    <i class="bx bx-category"></i>
                    <span class="ml-3 font-semibold">Category</span>
                </div>
                <i class="bi bi-chevron-down transition-transform" id="arrow-category"></i>
            </div>
            <div class="hidden ml-6 mt-2" id="submenu-category">
                <a href="#" class="flex items-center p-3 rounded-md text-gray-200 hover:bg-red-600 transition-colors">
                    <i class="fa-solid fa-gun"></i>
                    <span class="ml-3">Weapons</span>
                </a>
                <a href="#" class="flex items-center p-3 rounded-md text-gray-200 hover:bg-red-600 transition-colors">
                    <i class="bx bx-category"></i>
                    <span class="ml-3">Melees</span>
                </a>
                <a href="#" class="flex items-center p-3 rounded-md text-gray-200 hover:bg-red-600 transition-colors">
                    <i class="bx bx-category"></i>
                    <span class="ml-3">Emotions & Spray</span>
                </a>
            </div>
        </div>
    </nav>
    <?php 
        session_start();
        $isLogged = isset($_SESSION['user_id']);
        $isAdmin = false;
        if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
          $isAdmin = true;
        }
      ?>
    <?php if ($isLogged): ?>
      <a href="index.php?controller=account&action=signin" class="flex items-center p-3 rounded-md text-gray-200 hover:bg-red-600 transition-colors">
            <i class='bx bx-user'></i>
            <span class="ml-3 font-semibold">Account Center</span>
      </a>
    <?php else:?>
      <a href="index.php?controller=account&action=signin" class="flex items-center p-3 rounded-md text-gray-200 hover:bg-red-600 transition-colors">
            <i class='bx bx-user'></i>
            <span class="ml-3 font-semibold">Sign in</span>
      </a>
    <?php endif; ?>
    <a href="index.php?controller=account&action=signin" class="flex items-center p-3 rounded-md text-gray-200 hover:bg-red-600 transition-colors">
            <i class='bx bx-cart-alt'></i>
            <span class="ml-3 font-semibold">Cart</span>
    </a>
</div>

<script type="text/javascript">
    function openSidebar() {
        document.querySelector(".sidebar").classList.toggle("-translate-x-full");
    }

    function toggleDropdown(category) {
        const submenu = document.querySelector(`#submenu-${category}`);
        const arrow = document.querySelector(`#arrow-${category}`);
        submenu.classList.toggle('hidden');
        arrow.classList.toggle('rotate-180');
    }
</script>