<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            margin:20px 0;
        }
        table,th,td{
            border:1px solid black;
            text-align:center;
        }
        th,td{
            padding:5px;
        }
        button{
            display:inline-block;
            background-color:#bbb;
            padding:3px 10px;

        }
        #edit{
            background-color: #04AA6D;
        }
        #delete{
            background-color: #f44336;
        }
        a{
            text-decoration:none;
            font-size:18px;
            color:white;
        }
        #create{
            color:black;
            margin-bottom:20px;
        }
    </style>
</head>
<body>
<center>
<form class="example" method="post">
            <input type="text" placeholder="Search.." name="search">
            <button>Search</button>
    </form>
    <?php if($_SERVER['REQUEST_METHOD'] === 'POST') :?>
    <h1>All Families</h1>
        <?php 
        session_start();
        if ($_SESSION['user-type']=='employee') :?>
            <a id='create' href="<?= BASE_PATH.'Show/create' ?>">Create Family</a></br>
        
                   
        <?php endif?>
        
        <table>
            <thead>
            <tr>
                <th cols="3">Full Name</th>
                <th>Num of members</th>
                <th>Phone</th>
                <th>State</th>
                
                <?php
                if ($_SESSION['user-type']=='employee') :?>
                <th cols="2">Actions</th>
                <?php endif?>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($families as $family):?>
                
                <tr>
                    <td cols="3"><?= $family->getFName() ?> <?= $family->getPName() ?> <?= $family->getLName() ?></td>
                    <td><?= $family->getCount() ?></td>
                    <td><?= $family->getPhone() ?></td>
                    <td><?= $family->getState() ?></td>
                    <?php
                    if ($_SESSION['user-type']=='employee') :?>
                    <td cols="2">
                        <button id="edit">
                            <a href="<?= BASE_PATH.'Show/edit/?id='.$family->getId() ?>">Edit</a>
                        </button>
                        <button id="delete">
                            <a href="<?= BASE_PATH.'Show/delete/?id='.$family->getId() ?>">Delete</a>
                        </button>
                    </td>
                    <?php endif ?>

                </tr>
                
            <?php endforeach ?>
            </tbody>
        </table>
        <button>
        <a href="<?= BASE_PATH.'Show' ?>">Go Back</a></br>
        </button>
    </center>   
<?php endif ?>
</body>
</html>