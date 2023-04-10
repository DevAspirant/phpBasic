<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title> PHP Basic - this is the lecture from hsoub </title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <h2 class="mb-2 text-lg font-semibold text-grey-900 dark:text-white">Tasks</h2>
    <form class="w-full max-w-sm" action="task/create" method="post">
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-task">
                Task
            </label>
        </div>
        <div class="md:w-2/3">
            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" placeholder="task name" name="description">
        </div>
        </div>
        <div class="md:flex md:items-center">
            <div class="md:w-1/3"></div>
            <div class="md:w-2/3">
                <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" value="save">
                    Add
                </button>
            </div>
        </div>
    </form>
    <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-grey-400">
        <?php

        $tasks = QueryBuilder::get('tasks');
        foreach ($tasks as $task): ?>
            <li><?= "{$task->description}" ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>