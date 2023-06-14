<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Welcome to GenMDSE</h2>
    <?php 
      if(!empty(session()->getFlashdata('success'))) {
        ?>
          <div class="w-auto p-2 text-center text-white bg-green-500 rounded-lg m-4">Successly registered.</div>
        <?php
      } else if(!empty(session()->getFlashdata('fail'))) {
        ?>
          <div class="w-auto p-2 text-center text-white bg-red-500 rounded-lg m-4">Could not register user.</div>
        <?php
      }
    ?>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="<?= base_url('auth/registerUser') ?>" method="POST">
      <?= csrf_field() ?>
      <div>
        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
        <div class="mt-2">
          <input id="name" name="name" type="text" autocomplete="name" value="<?= set_value('name') ?>" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
        <span class="text-sm text-red-500"><?= isset($validation) ? display_form_errors($validation, 'name') : '' ?></span>
      </div>

      <div>
        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
        <div class="mt-2">
          <input id="email" name="email" type="text" autocomplete="email" value="<?= set_value('email') ?>" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
        <span class="text-sm text-red-500"><?= isset($validation) ? display_form_errors($validation, 'email') : '' ?></span>
      </div>

      <div>
        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
        <div class="mt-2">
          <input id="password" name="password" type="password" autocomplete="current-password" value="<?= set_value('password') ?>" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
        <span class="text-sm text-red-500"><?= isset($validation) ? display_form_errors($validation, 'password') : '' ?></span>
      </div>

      <div>
        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
        <div class="mt-2">
          <input id="confirmPassword" name="confirmPassword" type="password" autocomplete="current-password" value="<?= set_value('confirmPassword') ?>" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
        <span class="text-sm text-red-500"><?= isset($validation) ? display_form_errors($validation, 'confirmPassword') : '' ?></span>
      </div>

      <div>
        <button type="submit" id="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register Now</button>
      </div>
    </form>
  </div>
</div>