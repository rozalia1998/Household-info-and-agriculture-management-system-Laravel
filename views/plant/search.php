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
        span{
            display:block;
            color:red;
        }
    </style>
</head>
<body>
<center>
<form class="example" method="post">
    <select id="plants-type" name="plants_type" style="border-radius: 4px; padding: 8px; margin-bottom: 10px;">
          <option value="fruitful-trees">Fruitful Trees</option>
          <option value="grains">Grains</option>
          <option value="vegetables">Vegetables</option>
    </select>
    <button name='SearchByType'>Search By Type</button>

    <input type="text" placeholder="Enter The Annual Production.." name="annualproduction">
    <button name='SearchByProduction'>Search By Annual Production</button>
    
    <input type="text" placeholder="Enter The Annual Profits.." name="annualprofits">
    <button name='SearchByProfits'>Search By Annual Profits </button>

    <button name='Search'>Search</button></br>

</form>
    <?php if($_SERVER['REQUEST_METHOD'] === 'POST') :?>
    <h1>All Farms</h1>
        <table>
            <thead>
            <tr>
                <th cols="3">Full Name</th>
                <?php if (isset($_POST['SearchByType'])) :?>
                <th>Plants Type</th>
                <th>Production Quantity</th>
                <th>Annual Profits</th>
                <?php endif ?>
                <?php if (isset($_POST['SearchByProduction'])) :?>
                <th>Sum of Annual Production</th>
                <?php endif ?>
                <?php if (isset($_POST['SearchByProfits'])) :?>
                <th>Sum of Annual Profits</th>
                <?php endif ?>
                <?php
                session_start();
                if ($_SESSION['user-type']=='employee') :?>
                <th cols="2">Actions</th>
                <?php endif ?>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($objects as $object):?>
                <tr>
                    <td cols="3"><?= $object->fname ?> <?= $object->pname ?> <?= $object->lname  ?></td>
                    <?php if (isset($_POST['SearchByType'])) :?>
                    <td><?= $object->plants_type ?></td>
                    <td><?= $object->product_quantity ?></td>
                    <td><?= $object->annual ?></td>
                    <?php endif ?>
                    <?php if (isset($_POST['SearchByProduction'])) :?>
                    <td><?= $object->sum_annual_production ?></td>
                    <?php endif ?>
                    <?php if (isset($_POST['SearchByProfits'])) :?>
                    <td><?= $object->sum_annual_profits ?></td>
                    <?php endif ?>
                    <?php
                    if ($_SESSION['user-type']=='employee') :?>
                    <td cols="2">
                        <button id="edit">
                            <a href="<?= BASE_PATH.'plant/edit/?id='.$object->id ?>">Edit</a>
                        </button>
                        <button id="delete">
                            <a href="<?= BASE_PATH.'plant/delete/?id='.$object->id ?>">Delete</a>
                        </button>
                    </td>
                    <?php endif ?>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
<?php endif ?>
<button>
        <a href="<?= BASE_PATH.'plant/show' ?>">Go Back</a></br>
 </button>
</center>  
</body>
</html>