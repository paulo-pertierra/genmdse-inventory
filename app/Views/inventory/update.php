<?php
$validation = session()->getFlashdata('validation');
?>
<div class="p-4 sm:ml-72">
    <div class="mb-4 h-fit items-center justify-center rounded bg-indigo-100">

        <div class="relative overflow-x-auto p-4 rounded-lg">
            <div class="w-full my-2 flex font-semibold">
                <a href="/customer" class="bg-indigo-600 text-indigo-50 py-2 px-4 rounded-lg mr-1.5 hover:text-white hover:bg-indigo-800 transition-colors">
                    <span class="fa-solid fa-arrow-left mr-1.5 text-sm"></span>Go Back
                </a>
                <button href="/customer/create" class="bg-indigo-600 text-indigo-50 py-2 px-4 rounded-lg mr-1.5 disabled:bg-indigo-950" disabled>
                    <span class="fa-solid fa-plus mr-1.5 text-sm"></span>Add Item
                </button>
            </div>
            <div class=" overflow-hidden">
                <section class=" max-w-2xl bg-white p-4 rounded-lg">
                    <div class=" max-w-2xl rounded-lg">
                        <h2 class="text-xl font-bold text-gray-900 py-4">Product Details - ID: <?= $item['id'] ?> | <?= $item['brand'] ?> <?= $item['name'] ?></h2>
                        <form action="/inventory/<?= $item['id'] ?>/update" method="POST">
                            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                <div class="sm:col-span-1">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Brand</label>
                                    <input type="text" name="brand" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5     dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= $item['brand'] ?>" placeholder="<?= $item['brand'] ?>">
                                    <span class="text-xs text-red-500"><?= isset($validation) ? display_form_errors($validation, 'brand') : '' ?></span>
                                </div>
                                <div class="sm:col-span-1">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
                                    <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $item['name'] ?>" placeholder="<?= $item['name'] ?>">
                                    <span class="text-xs text-red-500"><?= isset($validation) ? display_form_errors($validation, 'name') : '' ?></span>
                                </div>
                                <div class="w-full">
                                    <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 ">Code</label>
                                    <input type="text" name="code" id="code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $item['code'] ?>" placeholder="<?= $item['code'] ?>">
                                    <span class="text-xs text-red-500"><?= isset($validation) ? display_form_errors($validation, 'code') : '' ?></span>
                                </div>
                                <div>
                                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 placeholder:text-gray-400">Category</label>
                                    <select id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                        <option disabled selected>Select category</option>
                                        <option value="electrical">Electrical</option>
                                        <option value="plumbing">Plumbing</option>
                                        <option value="misc">Misc.</option>
                                    </select>
                                    <span class="text-xs text-red-500"><?= isset($validation) ? display_form_errors($validation, 'category') : '' ?></span>
                                </div>
                                <div class="w-full">
                                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">Price</label>
                                    <input type="" name="price" step="0.01" min="0.1" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5     dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= $item['price'] ?>" placeholder="Php <?= $item['price'] ?>">
                                    <span class="text-xs text-red-500"><?= isset($validation) ? display_form_errors($validation, 'price') : '' ?></span>
                                </div>
                                <div>
                                    <label for="item-weight" class="block mb-2 text-sm font-medium text-gray-900 ">Quantity</label>
                                    <input type="number" name="quantity" id="item-weight" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5     dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Php <?= $item['qty'] ?>" value="<?= $item['qty'] ?>">
                                    <span class="text-xs text-red-500"><?= isset($validation) ? display_form_errors($validation, 'quantity') : '' ?></span>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">Description</label>
                                    <textarea id="description" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500     dark:focus:ring-primary-500 dark:focus:border-primary-500" name="description" placeholder="<?= $item['description'] ?>"><?= $item['description'] ?></textarea>
                                    <span class="text-xs text-red-500"><?= isset($validation) ? display_form_errors($validation, 'description') : '' ?></span>
                                </div>
                            </div>
                            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 mt-4">
                                <div class="sm:col-span-1">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Created At</label>
                                    <input type="text" name="brand" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5     dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="<?= $item['created_at'] ?>" disabled>
                                </div>
                                <div class="sm:col-span-1">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Updated At</label>
                                    <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="<?= $item['updated_at'] ?>" disabled>
                                </div>
                            </div>
                            <button type="submit" class="bg-green-600 text-green-50 py-2 px-4 rounded-lg mt-8 mb-2 w-full hover:text-white hover:bg-green-800 transition-colors">
                                Save Changes
                            </button>
                        </form>
                    </div>
                </section>
            </div>
        </div>

    </div>
</div>