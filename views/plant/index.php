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
        #create,#show{
            color:black;
            margin-bottom:20px;
        }
    </style>
</head>
<body>
<center>
        <button>
            <a id='search' href="<?= BASE_PATH.'plant/search'?>">Search</a>
        </button>
        
        <h1>All Farms</h1>
                   
        
        
        <table>
            <thead>
            <tr>
                <th cols="3">Full Name</th>
                <th>Plants Type</th>
                <th>Product Quantity (In Tons)</th>
                <th>Annual (In Million)</th>
                <?php
                session_start();
                if ($_SESSION['user-type']=='employee') :?>
                <th cols="2">Actions</th>
                <?php endif?>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($objects as $obj):?>
                <tr>
                    <td cols="3"><?= $obj->fname?> <?= $obj->pname ?> <?= $obj->lname ?></td>
                    <td><?= $obj->plants_type ?></td>
                    <td><?= $obj->product_quantity ?></td>
                    <td><?= $obj->annual ?></td>
                    <?php
                    if ($_SESSION['user-type']=='employee') :?>
                    <td cols="2">
                        <button id="edit">
                            <a href="<?= BASE_PATH.'plant/edit/?id='.$obj->id ?>">Edit</a>
                        </button>
                        <button id="delete">
                            <a href="<?= BASE_PATH.'plant/delete/?id='.$obj->id ?>">Delete</a>
                        </button>
                    </td>
                    <?php endif ?>

                </tr>
            
            <?php endforeach ?>
            </tbody>
        </table>
        <button>
            <a id='search' href="<?= BASE_PATH.'logout'?>">Logout</a>
        </button>
        <button>
        <a id='search' href="<?= BASE_PATH.'Show'?>">Go Back</a>
        </button>
        
    </center>  
</body>
</html>