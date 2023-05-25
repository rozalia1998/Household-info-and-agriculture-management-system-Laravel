<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit Family</h1>
    <form method="Post">
        <div>
            <label for="fname">First Name:</label>
            <input type="text" name="fname" id="fname" value="<?= $family->getFName() ?>">
        </div></br>
        <div>
            <label for="pname">Parent Name:</label>
            <input type="text" name="pname" id="pname" value="<?= $family->getPName() ?>">
        </div></br>
        <div>
            <label for="lname">Last Name:</label>
            <input type="text" name="lname" id="lname" value="<?= $family->getLName() ?>">
        </div></br>
        <div>
            <label for="num">Num of Members:</label>
            <input type="Number" name="num" id="num" value="<?= $family->getCount() ?>">
        </div></br>
        <div>
            <label for="phone">Phone:</label>
            <input type="text" name="phone" id="phone" value="<?= $family->getPhone() ?>">
        </div></br>
        <div>
            <label for="state">State:</label>
            <input type="radio" name="state" value="unemployee" checked>Un employee</input>
            <input type="radio" name="state" value="employee">Employee</input><br><br>
        </div>
        <div>
            <select name="area">
                <option value="Suburb">Suburb</option>
                <option value="City-center">City center</option>
                <option value="Northern-countryside">Northern countryside</option>
                <option value="Southern-countryside">Southern countryside</option>
                <option value="ُEastern-countryside">Eastern countryside</option>
                <option value="Western-countryside">Western countryside</option>
            </select>
        </div>
        <input type="hidden" name="id" value="<?= $family->getId() ?>">
        <button type='submit' name='edit'>Edit</button>
    </form>
</body>
</html>
