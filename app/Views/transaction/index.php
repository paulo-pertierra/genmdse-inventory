<div class="p-4 sm:ml-72">
<?php echo json_encode($transactions) ?>
    <div class="mb-4 h-fit items-center justify-center rounded bg-indigo-100">
        <div class="relative overflow-x-auto p-4 rounded-lg">
            <div class="w-full my-2 flex font-semibold">
                <button class="bg-indigo-600 text-indigo-50 py-2 px-4 rounded-lg mr-1.5 disabled:bg-indigo-950" disabled>
                    <span class="fa-solid fa-eye mr-1.5 text-sm"></span>View
                </button>
                <a href="/inventory/create" class="bg-indigo-600 text-indigo-50 py-2 px-4 rounded-lg mr-1.5 hover:text-white hover:bg-indigo-800 transition-colors">
                    <span class="fa-solid fa-plus mr-1.5 text-sm"></span>Add Item
                </a>
            </div>
            <div class=" overflow-hidden rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-indigo-50 uppercase bg-indigo-600">
                        <tr>
                            <td class="px-6 py-4">
                                Transaction ID
                            </td>
                            <td class="px-6 py-4">
                                Customer Name
                            </td>
                            <th scope="col" class="px-6 py-3">
                                Transaction Type
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Total Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Payment Amount
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Payment Change
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($transactions as $transaction) {
                        ?>
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    <?= $transaction['id'] ?>
                                </th>
                                <td class="px-6 py-4">
                                    <?= $transaction['name'] ?>
                                </td>
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    <?= $transaction['transaction_type'] ?>
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    <?= $transaction['total_price'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?= $transaction['payment_amount'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    Php <?= $transaction['payment_change'] ?>
                                </td>
                                <td class="px-6 py-4 flex items-center">
                                    <a href="/inventory/<?= $transaction['id'] ?>" class="bg-green-600 text-indigo-50 p-1 rounded-md mx-0.5">View/Edit</a>
                                    <form action="/inventory/<?= $transaction['id'] ?>/delete" method="POST">
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