<div class="p-4 sm:ml-72">
    <div class="mb-4 h-fit items-center justify-center rounded bg-indigo-100">

        <div class="relative overflow-x-auto p-4 rounded-lg">
            <div class="w-full my-2 flex font-semibold">
                <a href="./" class="bg-indigo-600 text-indigo-50 py-2 px-4 rounded-lg mr-1.5 hover:text-white hover:bg-indigo-800 transition-colors">
                    <span class="fa-solid fa-arrow-left mr-1.5 text-sm"></span>Go Back
                </a>
                <button href="/customer/create" class="bg-indigo-600 text-indigo-50 py-2 px-4 rounded-lg mr-1.5 disabled:bg-indigo-950" disabled>
                    <span class="fa-solid fa-plus mr-1.5 text-sm"></span>Add Item
                </button>
            </div>
            <div class=" overflow-hidden">
                <section class=" max-w-2xl bg-white p-4 rounded-lg">
                    <div class=" max-w-2xl rounded-lg">
                        <h2 class="text-xl font-bold text-gray-900 py-4">Product Details - ID: <?= $customer['id'] ?> | <?= $customer['name'] ?></h2>
                        <form action="<?= base_url('/dashboard/inventory/update') ?>" method="POST">
                            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                <div class="sm:col-span-1">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">ID</label>
                                    <input type="text" name="id" id="id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5     dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="<?= $customer['id'] ?>" disabled>
                                </div>
                                <div class="sm:col-span-1">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
                                    <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="<?= $customer['name'] ?>" disabled>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="address" class="block mb-2 text-sm font-medium text-gray-900 ">Address</label>
                                    <input type="text" name="address" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="<?= $customer['address'] ?>" disabled>
                                </div>
                                <div>
                                    <label for="contact_number" class="block mb-2 text-sm font-medium text-gray-900 placeholder:text-gray-400">Phone Number</label>
                                    <input type="contact_number" name="contact_number" id="contact_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="<?= $customer['contact_number'] ?>" disabled>
                                </div>
                                <div class="w-full">
                                    <label for="contact_email" class="block mb-2 text-sm font-medium text-gray-900 ">Email Address</label>
                                    <input type="" name="contact_email" step="0.01" min="0.1" id="contact_email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5     dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Php <?= $customer['contact_email'] ?>" disabled>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="remarks" class="block mb-2 text-sm font-medium text-gray-900 ">Remarks</label>
                                    <textarea id="remarks" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500     dark:focus:ring-primary-500 dark:focus:border-primary-500" name="remarks" placeholder="<?= $customer['remarks'] ?>" disabled></textarea>
                                </div>
                            </div>
                            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 mt-4">
                                <div class="sm:col-span-1">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Created At</label>
                                    <input type="text" name="created_at" id="created_at" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5     dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="<?= $customer['created_at'] ?>" disabled>
                                </div>
                                <div class="sm:col-span-1">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Updated At</label>
                                    <input type="text" name="updated_at" id="updated_at" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="<?= $customer['updated_at'] ?>" disabled>
                                </div>
                            </div>
                            <button type="submit" class="bg-indigo-600 text-indigo-50 py-2 px-4 rounded-lg mt-8 mb-2 w-full hover:text-white hover:bg-indigo-800 transition-colors">
                                Edit Customer
                            </button>
                        </form>
                    </div>
                </section>
            </div>
        </div>

    </div>
</div>