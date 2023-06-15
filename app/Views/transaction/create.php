<div class="p-4 sm:ml-72">
    <div class="mb-4 h-fit items-center justify-center rounded bg-indigo-100">
        <div class="relative overflow-x-auto p-4 rounded-lg">
            <div class="w-full my-2 flex font-semibold">
                <a href="/inventory" class="bg-indigo-600 text-indigo-50 py-2 px-4 rounded-lg mr-1.5 hover:text-white hover:bg-indigo-800 transition-colors">
                    <span class="fa-solid fa-arrow-left mr-1.5 text-sm"></span>Go Back
                </a>
                <button href="./create" class="bg-indigo-600 text-indigo-50 py-2 px-4 rounded-lg mr-1.5 disabled:bg-indigo-950" disabled>
                    <span class="fa-solid fa-plus mr-1.5 text-sm"></span>Add Item
                </button>
            </div>
            <div class=" overflow-hidden">
                <section class=" max-w-2xl bg-white p-4 rounded-lg">
                    <div class=" max-w-2xl rounded-lg">
                        <h2 class="text-xl font-bold text-gray-900 py-4">Add a new transaction</h2>
                        <?php
                        if (!empty(session()->getFlashdata('success'))) {
                        ?>
                            <div class="w-auto p-2 text-center text-white bg-green-500 rounded-lg m-4">Successfully added.</div>
                        <?php
                        } else if (!empty(session()->getFlashdata('fail'))) {
                        ?>
                            <div class="w-auto p-2 text-center text-white bg-red-500 rounded-lg m-4">Could not add to database.</div>
                        <?php
                        }
                        ?>
                        <form action="<?= base_url('/inventory/create') ?>" method="POST">
                            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                <div>
                                    <label for="customer" class="block mb-2 text-sm font-medium text-gray-900 placeholder:text-gray-400">Customer Name</label>
                                    <select id="customer" name="customer_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                        <option disabled selected="">Select customer name</option>
                                        <option value="1">We'll have to</option>
                                        <option value="2">loop this</option>
                                        <option value="3">later =)</option>
                                    </select>
                                    <span class="text-xs text-red-500"><?= isset($validation) ? display_form_errors($validation, 'customer') : '' ?></span>
                                </div>
                                <div>
                                    <label for="payment-method" class="block mb-2 text-sm font-medium text-gray-900 placeholder:text-gray-400">Payment Method</label>
                                    <select id="payment-method" name="payment_method" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                        <option disabled selected="">Select payment method</option>
                                        <option value="electrical">Electrical</option>
                                        <option value="plumbing">Plumbing</option>
                                        <option value="misc">Misc.</option>
                                    </select>
                                    <span class="text-xs text-red-500"><?= isset($validation) ? display_form_errors($validation, 'payment_method') : '' ?></span>
                                </div>
                                <div class="col-span-2 grid grid-cols-8 gap-2 border-2 border-solid p-2 rounded-lg">
                                    <h2 class="col-span-8 font-bold text-lg text-center">Products</h2>
                                    <div class="col-span-4 block text-sm font-medium text-gray-900 placeholder:text-gray-400">Product Name</div>
                                    <div class="col-span-3 block text-sm font-medium text-gray-900 placeholder:text-gray-400">Quantity</div>
                                    <div class="col-span-1 block text-sm font-medium text-gray-900 placeholder:text-gray-400">Action</div>
                                    <div class="col-span-4">
                                        <input id="payment-method" name="payment_method" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5" disabled>
                                    </div>
                                    <div class="col-span-3">
                                        <input id="payment-method" name="payment_method" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5" disabled>
                                    </div>
                                    <div class="col-span-1">
                                        <button class="w-full bg-red-500 hover:bg-red-700 bottom-0 p-2 m-0.5 rounded-lg font-bold text-red-50 transition-colors ease-in-out">Delete</button>
                                    </div>
                                    <hr class="col-span-8 mt-4">
                                    <div class="col-span-4">
                                        <input id="payment-method" name="payment_method" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                    </div>
                                    <div class="col-span-3">
                                        <input type="number" id="payment-method" name="payment_method" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                    </div>
                                    <div class="col-span-1">
                                        <button class="w-full bg-green-600 hover:bg-green-700 bottom-0 p-2 m-0.5 rounded-lg font-bold text-red-50 transition-colors ease-in-out">Add</button>
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">Description</label>
                                    <textarea id="description" rows="3" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500     dark:focus:ring-primary-500 dark:focus:border-primary-500" name="description" placeholder="Your description here"></textarea>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="payment_due" class="block mb-2 text-sm font-medium text-gray-900 placeholder:text-gray-400">Payment Amount</label>
                                    <input type="number" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border outline-black border-gray-300 focus:ring-primary-500 focus:border-primary-500     dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                </div>
                                <div class="col-span-1">
                                    <label for="payment_due" class="block mb-2 text-sm font-medium text-gray-900 placeholder:text-gray-400">Payment Change</label>
                                    <input type="text" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500     dark:focus:ring-primary-500 dark:focus:border-primary-500" disabled>
                                </div>
                                <div class="col-span-1">
                                    <label for="payment_due" class="block mb-2 text-sm font-medium text-gray-900 placeholder:text-gray-400">Payment Due</label>
                                    <input type="text" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500     dark:focus:ring-primary-500 dark:focus:border-primary-500" disabled>
                                </div>
                            </div>
                            <button type="submit" class="bg-indigo-600 text-indigo-50 py-2 px-4 rounded-lg mt-8 mb-2 w-full hover:text-white hover:bg-indigo-800 transition-colors">
                                Add product
                            </button>
                        </form>
                    </div>
                </section>
            </div>
        </div>

    </div>
</div>