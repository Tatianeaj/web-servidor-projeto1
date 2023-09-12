<?php
    //session
    session_start();
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-200">
    <div class="flex flex-col h-screen justify-between">
        <?php include('templates/header.php') ?>
        <div class="flex flex-col justify-center items-center">
            <?php if (isset($_SESSION['user'])): ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-11" role="alert">
                    <span class="block sm:inline">Você está logado como <?= $_SESSION['user']['email'] ?></span>
                </div>
            <?php endif; ?>
            <div class="flex flex-col w-full justify-center items-center"> 
                <h1 class="text-4xl font-semibold text-gray-800">Eventos em Destaque</h1>
                <div class="flex flex-row justify-between container">
                    <?php foreach($events_data as $event): ?>
                        <div class='box-border h-48 max-w-sm mx-auto mt-10 w-1/4 bg-white shadow-md rounded-lg overflow-hidden'>
                            <div class="p-4">
                                <h2 class="text-2xl font-semibold"><?= $event['nome'] ?></h2>
                                <p><?= $event['place'] ?></p>
                                <p><?= $event['data'] ?></p>
                                <p><?= $event['horario'] ?></p>
                            </div>
                            <?php // if user is logged in show button to register in event else show login button ?>
                            <?php if (isset($_SESSION['user'])): ?>
                                <div class="flex justify-center items-center">
                                    <a href="" class="bg-blue-500 text-white rounded-md px-4 py-2 hover:bg-blue-600">Inscrever-se</a>
                                </div>
                            <?php else: ?>
                                <div class="flex justify-center items-center">
                                    <a href="index.php?page=login" class="bg-blue-500 text-white rounded-md px-4 py-2 mb-4 hover:bg-blue-600">Entre para participar</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div>
            <?php include('templates/footer.html') ?>
        </div>
    </div>
</body>
</html>