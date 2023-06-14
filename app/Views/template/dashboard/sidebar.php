<aside class="fixed left-0 top-0 h-screen w-fit rounded-r-lg bg-indigo-600 p-4">
  <div class="flex items-center pb-8">
    <img src="https://fakeimg.pl/64x64?text=GENMDSE" class="rounded-full" alt="" />
    <div class="mx-4">
      <p class="font-semibold text-indigo-50">Gen MDSE Dashboard</p>
      <p class="text-sm text-indigo-50"><?= $title ?></p>
    </div>
  </div>
  <div>
    <a href="/dashboard" class="block w-64 rounded-lg p-2 text-lg font-semibold text-indigo-100 hover:cursor-pointer hover:bg-indigo-700 hover:text-white"><span class="mr-3 w-4 inline-block"><i class="fa-solid fa-gauge"></i></span> Dashboard</a>
    <a href="/dashboard/inventory" class="block w-64 rounded-lg p-2 text-lg font-semibold text-indigo-100 hover:cursor-pointer hover:bg-indigo-700 hover:text-white"><span class="mr-3 w-4 inline-block"><i class="fa-solid fa-boxes-stacked"></i></span> Inventory</a>
    <a href="/dashboard/customers" class="block w-64 rounded-lg p-2 text-lg font-semibold text-indigo-100 hover:cursor-pointer hover:bg-indigo-700 hover:text-white"><span class="mr-3 w-4 inline-block"><i class="fa-solid fa-people-arrows"></i></span> Customers</a>
    <a href="/dashboard/transactions" class="block w-64 rounded-lg p-2 text-lg font-semibold text-indigo-100 hover:cursor-pointer hover:bg-indigo-700 hover:text-white"><span class="mr-3 w-4 inline-block"><i class="fa-solid fa-handshake"></i></span> Transactions</a>
    <a href="/dashboard/summary" class="block w-64 rounded-lg p-2 text-lg font-semibold text-indigo-100 hover:cursor-pointer hover:bg-indigo-700 hover:text-white"><span class="mr-3 w-4 inline-block"><i class="fa-solid fa-people-arrows"></i></span> Summary</a>
  </div>
  <div class="mt-8">
    <div class="mb-4 flex items-center">
      <img src="https://fakeimg.pl/32x32?text=PP" class="rounded-lg" alt="" />
      <div>
      <p class="mx-4 text-xs text-indigo-100"><?= $userInfo['name']; ?> | <?= $userInfo['email']; ?></p>
      </div>
    </div>
    <a href="/dashboard/preferences" class="block w-64 rounded-lg p-2 text-sm font-medium text-indigo-100 hover:cursor-pointer hover:bg-indigo-700"><span class="mr-3 w-4 inline-block"><i class="fa-solid fa-user-gear"></i></span> Preferences</a>
    <a href="#" class="block w-64 rounded-lg p-2 text-sm font-medium text-indigo-100 hover:cursor-pointer hover:bg-indigo-700"><span class="mr-3 w-4 inline-block"><i class="fa-solid fa-right-from-bracket"></i></span> Log Out</a>
  </div>
</aside>