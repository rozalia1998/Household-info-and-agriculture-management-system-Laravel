<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Create Family</h1>
    <form method="Post">
        <div>
            <label for="fname">First Name:</label>
            <input type="text" name="fname" id="fname" required>
        </div>
        <div>
            <label for="pname">Parent Name:</label>
            <input type="text" name="pname" id="pname" required>
        </div>
        <div>
            <label for="lname">Last Name:</label>
            <input type="text" name="lname" id="lname" required>
        </div>
        <div>
            <label for="num">Number Of Members:</label>
            <input type="Number" name="num" id="num" required>
        </div>
        <div>
            <label for="phone">Phone:</label>
            <input type="text" name="phone" id="phone" required>
        </div>
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
        <button>Create</button>
    </form>
</body>
</html>