

{{--navbar--}}
<div class="flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">
    <aside id="sidebar"
           class="fixed top-0 left-0 z-20 flex flex-col flex-shrink-0 hidden w-64 h-full pt-16 font-normal duration-75 lg:flex transition-width"
           aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
            <ul class="space-y-2">
                <li>
                    <a href="/admin"
                       class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg aria-hidden="true"
                             class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                             fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                        </svg>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>

                <li>
                    <button type="button"
                            class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                            aria-controls="dropdown-example" data-collapse-toggle="ecommerce_list">
                        <svg aria-hidden="true"
                             class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                             fill="currentColor"
                             viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Plans</span>
                        <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <ul id="ecommerce_list" class="hidden py-2 space-y-2">
                        <li>
                            <a href="/admin/plans" class="flex items-center w-full  text-base font-normal text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                <span class="flex-1 items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg  group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Plans List</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/plans" class="flex items-center w-full  text-base font-normal text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                <span class="flex-1 items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg  group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Plans Users</span>
                            </a>
                        </li>
                    </ul>
                </li>

                {{--                <li>--}}
                {{--                    <button type="button"--}}
                {{--                            class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"--}}
                {{--                            aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">--}}
                {{--                        <svg aria-hidden="true"--}}
                {{--                             class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white dark:text-gray-400"--}}
                {{--                             focusable="false" data-prefix="fas" data-icon="gem" role="img"--}}
                {{--                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">--}}
                {{--                            <path fill="currentColor"--}}
                {{--                                  d="M378.7 32H133.3L256 182.7L378.7 32zM512 192l-107.4-141.3L289.6 192H512zM107.4 50.67L0 192h222.4L107.4 50.67zM244.3 474.9C247.3 478.2 251.6 480 256 480s8.653-1.828 11.67-5.062L510.6 224H1.365L244.3 474.9z"></path>--}}
                {{--                        </svg>--}}

                {{--                        <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Accounts</span>--}}
                {{--                        <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"--}}
                {{--                             xmlns="http://www.w3.org/2000/svg">--}}
                {{--                            <path fill-rule="evenodd"--}}
                {{--                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"--}}
                {{--                                  clip-rule="evenodd"></path>--}}
                {{--                        </svg>--}}
                {{--                    </button>--}}
                {{--                    <ul id="dropdown-example" class="hidden py-2 space-y-2">--}}
                {{--                        <li>--}}
                {{--                            <a href="transactions"--}}
                {{--                               class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Transactions</a>--}}
                {{--                        </li>--}}
                {{--                        <li>--}}
                {{--                            <a href="invoices"--}}
                {{--                               class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Invoices</a>--}}
                {{--                        </li>--}}
                {{--                        <li>--}}
                {{--                            <a href="payments"--}}
                {{--                               class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Payments</a>--}}
                {{--                        </li>--}}
                {{--                        <li>--}}
                {{--                            <a href="charges"--}}
                {{--                               class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Charges</a>--}}
                {{--                        </li>--}}

                {{--                        <li>--}}
                {{--                            <a href="expenses"--}}
                {{--                               class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Expenses</a>--}}
                {{--                        </li>--}}


                {{--                    </ul>--}}
                {{--                </li>--}}

                {{--                <li>--}}
                {{--                    <a href="/clients"--}}
                {{--                       class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">--}}
                {{--                        <svg aria-hidden="true"--}}
                {{--                             class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"--}}
                {{--                             fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">--}}
                {{--                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"--}}
                {{--                                  clip-rule="evenodd"></path>--}}
                {{--                        </svg>--}}
                {{--                        <span class="flex-1 ml-3 whitespace-nowrap">Clients</span>--}}
                {{--                    </a>--}}
                {{--                </li>--}}

            </ul>
        </div>
    </aside>
</div>
