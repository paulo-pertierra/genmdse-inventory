<?php 
$items = [
    [
        'id' => '1',
        'name' => 'A',
        'address' => 'A',
        'contact_number' => 'A',
        'contact_email' => 'plumbing',
        'created_at' => '2023-06-14',
    ]
]
?>

<div class="p-4 sm:ml-72">
    <div class="mb-4 h-fit items-center justify-center rounded bg-indigo-100">

        <div class="relative overflow-x-auto p-4 rounded-lg">
            <div class="w-full my-2 flex font-semibold">
                <button href="./" class="bg-indigo-600 text-indigo-50 py-2 px-4 rounded-lg mr-1.5 hover:text-white hover:bg-indigo-800 transition-colors disabled:bg-indigo-950" disabled>
                    <span class="fa-solid fa-eye mr-1.5 text-sm"></span>View
                </button>
                <a href="customer/create" class="bg-indigo-600 text-indigo-50 py-2 px-4 rounded-lg mr-1.5 disabled:bg-indigo-950" >
                    <span class="fa-solid fa-plus mr-1.5 text-sm"></span>Add Customer
                </a>
            </div>
            <div class=" overflow-hidden rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-indigo-50 uppercase bg-indigo-600">
                        <tr>
                            <td class="px-6 py-4">
                                ID
                            </td>
                            <td class="px-6 py-4">
                                Name
                            </td>
                            <th scope="col" class="px-6 py-3">
                                Address
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Phone Number
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email Address
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Created At
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($items as $item) {
                        ?>
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    <?= $item['id'] ?>
                                </th>
                                <td class="px-6 py-4">
                                    <?= $item['name'] ?>
                                </td>
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    <?= $item['address'] ?>
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    <?= $item['contact_email'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?= $item['contact_number'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    Php <?= $item['created_at']?>
                                </td>
                                <td class="px-6 py-4 flex items-center">
                                    <a href="/inventory/<?= $item['id'] ?>" class="bg-green-600 text-indigo-50 p-1 rounded-md mx-0.5">View/Edit</a>
                                    <form action="/inventory/<?= $item['id'] ?>/delete" method="POST">
                                        <button type="submit" class="bg-red-600 text-indigo-50 p-1 rounded-md mx-0.5">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>