<div class="p-4 sm:ml-72">
    <div class="mb-4 h-fit items-center justify-center rounded bg-indigo-100">
        <div class="relative overflow-x-auto p-4 rounded-lg">
            <div class="w-full my-2 flex font-semibold">
                <a href="/transaction" class="bg-indigo-600 text-indigo-50 py-2 px-4 rounded-lg mr-1.5 hover:text-white hover:bg-indigo-800 transition-colors">
                    <span class="fa-solid fa-arrow-left mr-1.5 text-sm"></span>Go Back
                </a>
                <button href="./create" class="bg-indigo-600 text-indigo-50 py-2 px-4 rounded-lg mr-1.5 disabled:bg-indigo-950" disabled>
                    <span class="fa-solid fa-plus mr-1.5 text-sm"></span>Add Item
                </button>
                <?php

                ?>
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
                        <form action="<?= base_url('/transaction/create') ?>" method="POST">
                            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                <div class="col-span-2 grid grid-cols-8 gap-2 border-2 border-solid p-2 rounded-lg max-h-64 overflow-auto">
                                    <h2 class="col-span-8 font-bold text-lg text-center">Products</h2>
                                    <div class="col-span-4 block text-sm font-medium text-gray-900 placeholder:text-gray-400">Product Name</div>
                                    <div class="col-span-4 block text-sm font-medium text-gray-900 placeholder:text-gray-400">Quantity</div>

                                    <?php foreach (array_keys($cartItems) as $index) {
                                    ?>
                                        <div class="col-span-4">
                                            <input type="number" name="cart_item_id[<?= $index ?>]" value="<?= $cartItems[$index]['id'] ?>" hidden>
                                            <input id="cart-item-name[]" name="cart_item_name[<?= $index ?>]" value="<?= $cartItems[$index]['name'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-none block w-full p-2.5 cursor-default" readonly>
                                        </div>
                                        <div class="col-span-3">
                                            <input id="cart-item-qty[]" name="cart_item_qty[<?= $index ?>]" value="<?= $cartItems[$index]['qty'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-none block w-full p-2.5 cursor-default" readonly>
                                        </div>
                                        <div class="col-span-1">
                                            <button class="w-full bg-red-500 hover:bg-red-700 bottom-0 p-2 m-0.5 rounded-lg font-bold text-red-50 transition-colors ease-in-out" formaction="/transaction/items/<?= $index ?>/delete">Delete</button>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                    <hr class="col-span-8 mt-4">
                                    <div class="col-span-4">
                                        <select id="new-cart-item" name="new_cart_item" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                            <?php
                                            foreach ($items as $item) {
                                            ?>
                                                <option value="<?= $item['id'] ?>|<?= $item['price'] ?>|Php <?= $item['price'] ?> - <?= $item['brand'] ?><?= $item['name'] ?>">Php <?= $item['price'] ?> - <?= $item['brand'] ?> <?= $item['name'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-span-4">
                                        <input type="number" id="new_cart_item_qty" name="new_cart_item_qty" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                    </div>
                                    <div class="col-span-4">
                                        <button class="w-full bg-orange-600 hover:bg-red-700 bottom-0 p-2 m-0.5 rounded-lg font-bold text-red-50 transition-colors ease-in-out" formaction="/transaction/items/delete">Clear</button>
                                    </div>
                                    <div class="col-span-4">
                                        <button class="w-full bg-green-600 hover:bg-green-700 bottom-0 p-2 m-0.5 rounded-lg font-bold text-red-50 transition-colors ease-in-out" formaction="/transaction/items/update">Add</button>
                                    </div>
                                </div>
                                <div>
                                    <label for="customer" class="block mb-2 text-sm font-medium text-gray-900 placeholder:text-gray-400">Customer Name</label>
                                    <select id="customer" name="customer_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                        <option disabled selected="">Select customer name</option>
                                        <?php foreach ($customers as $customer) {
                                        ?>
                                            <option value="<?= $customer['id'] ?>"><?= $customer['name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <span class="text-xs text-red-500"><?= isset($validation) ? display_form_errors($validation, 'customer_id') : '' ?></span>
                                </div>
                                <div>
                                    <label for="payment-method" class="block mb-2 text-sm font-medium text-gray-900 placeholder:text-gray-400">Payment Method</label>
                                    <select id="payment-method" name="payment_method" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                        <option disabled selected="">Select payment method</option>
                                        <option value="CASH">Cash</option>
                                        <option value="CREDIT">Credit</option>
                                    </select>
                                    <span class="text-xs text-red-500"><?= isset($validation) ? display_form_errors($validation, 'payment_method') : '' ?></span>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="payment_due" class="block mb-2 text-sm font-medium text-gray-900 placeholder:text-gray-400">Payment Amount</label>
                                    <input type="number" name="payment_amount" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:outline-none">
                                    <span class="text-xs text-red-500"><?= isset($validation) ? display_form_errors($validation, 'payment_amount') : '' ?></span>
                                </div>
                                <div class="col-span-2">
                                    <label for="payment_due" class="block mb-2 text-sm font-medium text-gray-900 placeholder:text-gray-400 cursor-default">Payment Due</label>
                                    <input type="text" value="<?= $paymentDue ?>" name="payment_due" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:outline-none cursor-default" readonly>
                                    <span class="text-xs text-red-500"><?= isset($validation) ? display_form_errors($validation, 'payment_due') : '' ?></span>
                                </div>
                            </div>
                            <button type="submit" class="bg-indigo-600 text-indigo-50 py-2 px-4 rounded-lg mt-8 mb-2 w-full hover:text-white hover:bg-indigo-800 transition-colors">
                                Complete Transaction
                            </button>
                        </form>
                    </div>
                </section>
            </div>
        </div>

    </div>
</div>