<div class='grid grid-cols-12'>
    <div class="banner col-span-8">
    </div>
    
    <div class="col-span-4  text-white font-sans font-bold  min-h-screen bg-white pl-7 flex flex-col  justify-between">
        <div class="flex flex-col justify-center mt-[150px]">
            <div class="text-4xl text-black">
                <div class="uppercase">Sign In</div>      
                <form method="post" action="index.php?controller=account&action=login">
                    <div class="pt-10 pr-20">                        
                        <label class="text-sm font-poppins font-bold">
                            Username
                        </label>
                        <input 
                            type="text" 
                            name="username" 
                            placeholder="Write your username" 
                            autocomplete="off"
                            class="w-full custom-input text-black py-3 px-4 text-base font-sans"/>                            
                    </div>
                    <div class="pt-2 pr-20">
                        <label class="text-sm font-poppins font-bold">
                            Password
                        </label>
                        <input 
                            type="password" 
                            name="password" 
                            placeholder="Write your password" 
                            class="w-full bg-white text-black py-3 px-4 custom-input text-base font-sans"/>
                        <a href="" class="text-sm font-sans font-medium text-gray-600 underline">
                            Forgot password?
                        </a>
                    </div>
                    <!-- Button -->
                    <div class="text-sm font-sans font-medium w-full pr-20 pt-14">
                        <button 
                            type="submit"
                            name="login"   
                            class="text-center w-full font-bold font-custom py-4 bg-redCustom  text-white">
                                SIGN IN
                        </button>
                    </div>
                </form>              
                <a href="index.php?controller=account&action=signup" class="text-sm font-poppins font-medium underline">Don't have an account? Sign up here</a>
            </div>
        </div>
        <!-- Text -->
        <a href="index.php?controller=pages&action=home" class="text-sm font-sans font-medium text-gray-400 underline pr-20">
            Back to home
        </a>
    </div>    
</div>

<style>
    .banner {
        background: url('public/images/banner.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        height: 100vh; /* Đảm bảo hình nền chiếm toàn bộ chiều cao của màn hình */
    }

    .custom-input {
        border: none;
        border-bottom: 2px solid black;
    }

    .custom-input:focus {
        outline: none!important;
    }
</style>
