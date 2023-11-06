
<div>
    <div class="rocket">
        <div class="rocket-body"></div>
        <div class="rocket-fin-left"></div>
        <div class="rocket-fin-right"></div>
        <div class="rocket-window"></div>
    </div>
    <h2 class="text-white font-bold text-center my-10 text-4xl">Coming Soon</h2>
    <div class="mt-16 text-center">
        <a href="{{route('home')}}"
           class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
            <svg class="mr-2 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                      clip-rule="evenodd"></path>
            </svg>
            Go back home
        </a>
    </div>
</div>

<style>
    .rocket {
        width: 70px;
        height: 150px;
        position: relative;
        margin: 0 auto;
    }

    .rocket-body {
        width: 50px;
        height: 100px;
        border-radius: 25px 25px 0 0;
        background-color: #F44336;
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
    }

    .rocket-fin-left {
        width: 0;
        height: 0;
        border-top: 20px solid transparent;
        border-right: 20px solid #F44336;
        border-bottom: 20px solid transparent;
        position: absolute;
        bottom: 0;
        left: 0;
    }

    .rocket-fin-right {
        width: 0;
        height: 0;
        border-top: 20px solid transparent;
        border-left: 20px solid #F44336;
        border-bottom: 20px solid transparent;
        position: absolute;
        bottom: 0;
        right: 0;
    }

    .rocket-window {
        width: 20px;
        height: 20px;
        background-color: #FFFFFF;
        border-radius: 50%;
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
    }

</style>
